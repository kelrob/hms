<?php

namespace App\Http\Controllers\Security;

use App\Models\SecurityQuestion;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Sentinel;
use Validator;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class LoginController extends Controller
{
    public function index() {
        return view('security.login');
    }

    public function loginUser(Request $request) {
        //Sentinel::disableCheckpoints();

        $errorMessages = [
            'login_id.required' => 'Login Id is required',
            'password.required' => 'Password is Required',
            'captcha.required' => 'Captcha is Required',
            'captcha.captcha' => 'Captcha entered does not match with Captcha'
        ];

        $validateData = Validator::make($request->all(),
            [
                'login_id' => 'required',
                'password' => 'required',
                'captcha' => 'required|captcha'
            ], $errorMessages
        );

        if ($validateData->fails()) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review fields',
                'errors' => $validateData->errors()->all()
            );

            $response = $returnData;
            return view('security.login', compact('response'));
        }

        try {
            $user = Sentinel::authenticate($request->all());
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review',
                'errors' => ["You are banned for $delay seconds"]
            );

            $response = $returnData;
            return view('security.login', compact('response'));

        } catch (NotActivatedException $e) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review',
                'errors' => ["Go and activate your account"]
            );

            $response = $returnData;
            return view('security.login', compact('response'));
        }

        if (Sentinel::check()) {

            if (Sentinel::getUser()->roles->first()->name == 'Admin') {

                $userProfile = UserProfile::find(Sentinel::getUser()->id);
                $question = SecurityQuestion::find($userProfile->security_question);
                $questionId = $question->id;
                $securityQuestion = $question->question_name;


                return view('security.security_question', compact('securityQuestion', 'questionId'));
            } else if (Sentinel::getUser()->roles->first()->name == 'Doctor') {

                if (Sentinel::getUser()->login_count == 0) {
                    return view('security.first_time');
                }
                return redirect(url('/doctor-dashboard'));
            } else if (Sentinel::getUser()->roles->first()->name == 'Patient') {

                if (Sentinel::getUser()->login_count == 0) {
                    return view('security.first_time');
                }
                return redirect(url('/patient-dashboard'));
            }

        } else {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review',
                'errors' => ["Login Id and Login Pass is mismatched"]
            );

            $response = $returnData;
            return view('security.login', compact('response'));
        }

    }

    public function changePassword(Request $request) {

        # Get the logged in User Info
        $user = Sentinel::getUser();

        # Important Variables
        $newPasswordAgain = $request->input('new_password_again');
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');

        $validateData = Validator::make($request->all(),
            [
                'current_password' => 'required',
                'new_password' => 'required|min:8|alpha_dash',
                'new_password_again' => 'required'
            ]
        );

        if ($validateData->fails()) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review fields',
                'errors' => $validateData->errors()->all()
            );

            $response = $returnData;
            return view('security.first_time', compact('response'));
        }

        if ($newPassword == $newPasswordAgain) {
            if (Hash::check($currentPassword, $user->password)) {

                $user->password = Hash::make($newPassword);
                $user->login_count = 1;
                $user->save();

                $returnData = array(
                    'status' => 'error',
                    'message' => 'Please review',
                    'messages' => ["Password Changed successfully"]
                );

                $success = $returnData;
                return view('security.first_time', compact('success'));

            } else {
                $returnData = array(
                    'status' => 'error',
                    'message' => 'Please review',
                    'errors' => ["Current Password Entered does not match with old password"]
                );

                $response = $returnData;
                return view('security.first_time', compact('response'));
            }
        } else {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review',
                'errors' => ["New Password and New Password again do not match"]
            );

            $response = $returnData;
            return view('security.first_time', compact('response'));
        }


        //dd($user->password);
    }

    public function authenticateAdmin(Request $request) {

        # Get the logged in User Info
        $user = Sentinel::getUser();

        # Logged User Profile in an array
        $userProfile = UserProfile::find(Sentinel::getUser()->id);

        $userSecurityAnswer = $userProfile->security_answer;
        $userSecurityQuestion = $userProfile->security_question;

        # Get full info question
        $question = SecurityQuestion::find($userProfile->security_question);
        $questionId = $question->id;
        $securityQuestion = $question->question_name;

        $question = $request->question;
        $answer = $request->answer;


        $validateData = Validator::make($request->all(),
            [
                'question' => 'required|numeric',
                'answer' => 'required',
            ]
        );

        if ($validateData->fails()) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review fields',
                'errors' => $validateData->errors()->all()
            );

            $response = $returnData;
            return view('security.security_question', compact('response', 'questionId', 'securityQuestion'));
        }

        if (strtolower($answer) == $userSecurityAnswer && $question == $userSecurityQuestion) {
            return redirect(url('/admin'));
        } else {

            $response = array(
                'status' => 'error',
                'message' => 'Please review fields',
                'errors' => ['Authentication Failed']
            );

            return view('security.security_question', compact('response', 'questionId', 'securityQuestion'));
        }

    }

    public function logout() {
        Sentinel::logout();
        return redirect(url('/login'));
    }

    public function refreshCaptcha() {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
