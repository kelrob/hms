<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        Sentinel::disableCheckpoints();

        $errorMessages = [
            'login_id.required' => 'Login Id is required',
            'password.required' => 'Password is Required'
        ];

        $validateData = Validator::make($request->all(),
            [
                'login_id' => 'required',
                'password' => 'required'
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
                return redirect(url('/admin'));
            } else if (Sentinel::getUser()->roles->first()->name == 'Doctor') {
                return redirect(url('/doctor-dashboard'));
            } else if (Sentinel::getUser()->roles->first()->name == 'Patient') {
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


    public function logout() {
        Sentinel::logout();
        return redirect(url('/login'));
    }
}
