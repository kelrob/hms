<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use Validator;
use Sentinel;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\SecurityQuestion;

class AdminController extends Controller
{
    public function index() {
        $data = Roles::where('name', 'Admin')->get();
        $securityQuestions = SecurityQuestion::all();

        return view('security.admin_register', compact('data', 'securityQuestions'));
    }


    public function registerAdmin(Request $request) {

        $data = Roles::where('name', 'Admin')->get();
        $securityQuestions = SecurityQuestion::all();
        $info = $request->all();
        $roleId =  $request->input('identity');

        $identity = Roles::where('id', $roleId)->first();
        if ($identity->name == 'Admin') {

            $errorMessages = [
                'email.email' => 'Invalid Email',
                'email.required' => 'Email is Required',
                'password.required' => 'Password is Required',
                'password.min' => 'Password should not be less than one 8 Characters',
                'fullname.required' => 'Fullname is Required',
                'login_id.required' => 'Login Id is Required',
                'login_id.unique' => 'This Login ID has already been Used',
                'login_id.max' => 'Login Id can not be more than 100 Characters',
                'login_id.min' => 'Login Id can not be less than 8 Characters'
            ];

            $validateData = Validator::make($request->all(),
                [
                    'login_id' => 'required|unique:users|max:100',
                    'password' => 'required|min:8|max:128',
                    'fullname' => 'required',
                    'email' => 'required|email',
                    'security_question' => 'required|numeric',
                    'security_answer' => 'required'
                ], $errorMessages
            );

            if ($validateData->fails()) {
                $returnData = array(
                    'status' => 'error',
                    'message' => 'Please review fields',
                    'errors' => $validateData->errors()->all()
                );

                $response = $returnData;
                return view('security.admin_register', compact('data', 'response', 'securityQuestions'));
            }

            $user = Sentinel::registerAndActivate($info);
            $role = Sentinel::findRoleById($roleId);

            $role->users()->attach($user);

            # Automatically add extra information to User Profile
            $profile = new UserProfile(
                [
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'profile_type' => 'admin',
                    'security_question' => $request->security_question,
                    'security_answer' => strtolower($request->security_answer)
                ]
            );

            # Get the just Inserted Id
            $newUser = User::find($user->id);

            # Save information to the database base on the relationship
            $newUser->userProfile()->save($profile);

            $response = 'Admin Registered Successfully';
            return view('security.admin_register', compact('data', 'response', 'securityQuestions'));

        }
    }
}
