<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Sentinel;
use App\Models\Roles;
use Validator;
use App\Models\User;
use App\Models\UserProfile;

class AdminController extends Controller
{

    public function profileCount($profileType) {
        return UserProfile::where('profile_type', '=', $profileType)->count();
    }

    public function profileCountByGender($gender, $profileType) {
        return UserProfile::where('profile_type', '=', $profileType)
            ->where('sex', '=', $gender)->count();
    }

    /**
     * The Admin Index after Admin Login
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        $totalDocs = $this->profileCount('doctor');
        $maleDocCount = $this->profileCountByGender('male','doctor');
        $femaleDocCount = $this->profileCountByGender('female','doctor');


        $totalPatients = $this->profileCount('patient');
        $malePatientCount = $this->profileCountByGender('male', 'patient');
        $femalePatientCount = $this->profileCountByGender('female', 'patient');

        if ($totalPatients == 0) {
            $totalPatients = 1;
        }

        $malePercentage = floor(($malePatientCount / $totalPatients) * 100);
        $femalePercentage = floor(($femalePatientCount / $totalPatients) * 100);

        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);
        return view('Dashboard.admin.admin', compact(
            'user', 'totalDocs', 'maleDocCount', 'femaleDocCount', 'malePercentage', 'femalePercentage'
            )
        );

    }

    /**
     * Fetches all the doctors
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function doctors() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Return just the fullname
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Return all Doctors with their complete profile
        $users = new User();
        $users = $users::with('userProfile')
            ->whereHas('userProfile', function ($query) {
                $query->where('profile_type', '=', 'doctor');
            })->get();

        return view('Dashboard.admin.doctors', compact('user', 'users'));
    }

    /**
     * Fetches all the doctors
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function patients() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Return just the fullname
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Return all Patients with their complete profile
        $users = new User();
        $users = $users::with('userProfile')
            ->whereHas('userProfile', function ($query) {
                $query->where('profile_type', '=', 'patient');
            })->get();

        return view('Dashboard.admin.patients', compact('user', 'users'));
    }

    /**
     * This Method Generates a Random String
     * @param int $length   Length of String
     *
     * @return string   Returns the String
     */
    public function generateString($length = 12)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()[]{}-;:_';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * This Method Registers a New Doctor
     * @param \Illuminate\Http\Request $request    - This collects the info passed from thee form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View - This returns all result in a view
     */
    public function registerDoctor(Request $request) {

        # Get the logged in User Info
        $user = Sentinel::getUser();

        # Generate a Password for the New Doctor
        $password = $this->generateString();

        # Add Extra $request field Variables
        $request->request->add(
            [
                'password' => $password,
                'login_id' => $request->email,
            ]
        );

        # Get all the Request variables and values
        $info = $request->all();

        # Get the Doctor Role Id from the Database
        $roleId = Roles::where('name', 'Doctor')->first()->id;

        # Process the information passed
        $validateData = Validator::make($request->all(),
            [
                'fullname' => 'required',
                'email' => 'required|email|unique:user_profile',
                'address' => 'required',
                'phone' => 'required|unique:user_profile',
                'department' => 'required',
                'sex' => 'required'
            ]
        );

        # If the validation fails, return error response in a view
        if ($validateData->fails()) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review fields. Make sure all fields are not empty and a correct email is passed!',
                'errors' => $validateData->errors()->all()
            );

            //$jsonResponse =  response()->json(['error'=> $returnData['errors']]);
            $errorResponse = $returnData['errors'];
            return view('Dashboard.admin.add-doctor', compact('errorResponse', 'user'));
        }

        # If validation doesnt fails Register and Activate User
        # Also Get the Doctor Id
        $data = Sentinel::registerAndActivate($info);
        $role = Sentinel::findRoleById($roleId);

        # Attach Base on RoleModel Relationships
        $role->users()->attach($data);

        # Automatically add extra information to User Profile
        $profile = new UserProfile(
            [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'sex' => $request->sex,
                'address' => $request->address,
                'doc_dept' =>$request->department,
                'profile_type' => 'doctor'
            ]
        );

        # Get the just Inserted Id
        $newUser = User::find($data->id);

        # Save information to the database base on the relationship
        $newUser->userProfile()->save($profile);

        # Success Response
        $successResponse = '<p>Doctor Added Successfully</p> <h3>Login_id: <b>' . $request->email . '</b><br /> Password: <b>' . $password . '</b></h3>';
        
        //$successResponse = json_decode($jsonResponse, 'true');


        return view('Dashboard.admin.add-doctor', compact('successResponse', 'user'));
 
    }

    public function registerPatient(Request $request) {

        # Get the logged in User Info
        $user = Sentinel::getUser();

        # Generate a Password for the New Doctor
        $password = $this->generateString();

        # Add Extra $request field Variables
        $request->request->add(
            [
                'password' => $password,
                'login_id' => $request->email,
            ]
        );

        # Get all the Request variables and values
        $info = $request->all();

        # Get the Patient Role Id from the Database
        $roleId = Roles::where('name', 'Patient')->first()->id;

        # Process the information passed
        $validateData = Validator::make($request->all(),
            [
                'fullname' => 'required',
                'email' => 'required|email|unique:user_profile',
                'address' => 'required',
                'phone' => 'required|unique:user_profile',
                'age' => 'required',
                'sex' => 'required',
                'blood_group' => 'required'
            ]
        );

        # If the validation fails, return error response in a view
        if ($validateData->fails()) {
            $returnData = array(
                'status' => 'error',
                'message' => 'Please review fields',
                'errors' => $validateData->errors()->all()
            );

            //$jsonResponse =  response()->json(['error'=> $returnData['errors']]);
            $errorResponse = $returnData['errors'];
            return view('Dashboard.admin.add-patient', compact('errorResponse', 'user'));
        }

        # If validation doesnt fails Register and Activate User
        # Also Get the Patient Id
        $data = Sentinel::registerAndActivate($info);
        $role = Sentinel::findRoleById($roleId);

        # Attach Base on RoleModel Relationships
        $role->users()->attach($data);

        # Automatically add extra information to User Profile
        $profile = new UserProfile(
            [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone' => $request->phone,
                'sex' => $request->sex,
                'address' => $request->address,
                'age' => $request->age,
                'blood_group' => $request->blood_group,
                'profile_type' => 'patient'
            ]
        );

        # Get the just Inserted Id
        $newUser = User::find($data->id);

        # Save information to the database base on the relationship
        $newUser->userProfile()->save($profile);

        # Success Response
        $successResponse = '<p>Patient Added Successfully</p> <h3>Login_id: <b>' . $request->email . '</b><br /> Password: <b>' . $password . '</b></h3>';

        //$successResponse = json_decode($jsonResponse, 'true');


        return view('Dashboard.admin.add-patient', compact('successResponse', 'user'));

    }

    public function getDoctorInfo($doctorId) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Return just the fullname
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Get the profile info of doctor
        $doctor = UserProfile::find($doctorId);

        # Get all the roles
        $roles = Roles::get();

        return view('Dashboard.admin.edit-doctor', compact(
                'user', 'doctorId', 'doctor', 'roles'
            )
        );
    }

    public function getPatientInfo($patientId) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Return just the fullname
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Get the profile info of Patient
        $patient = UserProfile::find($patientId);

        # Get all the roles
        $roles = Roles::get();

        return view('Dashboard.admin.edit-patient', compact(
                'user', 'patientId', 'patient', 'roles'
            )
        );
    }

    public function updateDoctorInfo(Request $request, $doctorId) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Return just the fullname
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Get the profile info of doctor
        $doctor = UserProfile::find($doctorId);

        # Get all the roles
        $roles = Roles::get();


        # Start Processing Update
        $validateData = Validator::make($request->all(),
            [
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'sex' => 'required',
                'doc_dept' => 'required',
                'address' => 'required'
            ]
        );

        # If the validation fails, return error response in a view
        if ($validateData->fails()) {

            # withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validateData->messages());
        }else {
            UserProfile::where('id', $doctorId)->update(array(
                    'fullname' => $request->input('fullname'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'sex' => $request->input('sex'),
                    'doc_dept' => $request->input('doc_dept'),
                    'address' => $request->input('address')
                )
            );

            $message = 'Doctor Profile Updated successfully';

            return view('Dashboard.admin.edit-doctor', compact(
                    'user', 'doctorId', 'doctor', 'roles', 'message'
                )
            );
        }
    }

    public function updatePatientInfo(Request $request, $patientId) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Return just the fullname
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Get the profile info of doctor
        $patient = UserProfile::find($patientId);

        # Get all the roles
        $roles = Roles::get();


        # Start Processing Update
        $validateData = Validator::make($request->all(),
            [
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'sex' => 'required',
                'blood_group' => 'required',
                'age' => 'required',
                'address' => 'required'
            ]
        );

        # If the validation fails, return error response in a view
        if ($validateData->fails()) {

            # withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validateData->messages());
        }else {
            UserProfile::where('id', $patientId)->update(array(
                    'fullname' => $request->input('fullname'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'sex' => $request->input('sex'),
                    'blood_group' => $request->input('blood_group'),
                    'address' => $request->input('address'),
                    'age' => $request->input('age')
                )
            );

            $message = 'Patient Profile Updated successfully';


            return view('Dashboard.admin.edit-patient', compact(
                    'user', 'patientId', 'patient', 'roles', 'message'
                )
            );
        }
    }

    public function deleteDoctorInfo($doctorId) {
        $userDelete = User::find($doctorId);
        $userDelete->delete();

        return redirect('/doctors');
    }


    public function deletePatientInfo($patientId) {
        $userDelete = User::find($patientId);
        $userDelete->delete();

        return redirect('/patients');
    }
}
