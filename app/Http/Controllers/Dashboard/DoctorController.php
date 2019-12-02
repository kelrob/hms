<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use Validator;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Appointment;
class DoctorController extends Controller
{
    public function index() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Appointment count
        $appointmentCount = Appointment::where('user_id', '=', $loggedUser->id)
            ->where('status', '=', '0')->count();

        # Patient Count
        $patientCount = UserProfile::where('profile_type', '=', 'patient')->count();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        return view('Dashboard.doctor.dashboard', compact('user', 'appointmentCount', 'patientCount'));
    }

    public function doctorAppointment() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Doctor Appointment
        $docAppointment = Appointment::where('user_id', '=', $loggedUser->id)->get();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        return view('Dashboard.doctor.appointments', compact('user', 'docAppointment'));
    }

    public function doctorPrescription() {


        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        $prescriptions = Prescription::where('user_id', '=', $loggedUser->id)->get();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Return all Patients with their complete profile
        $users = new User();
        $users = $users::with('userProfile')
            ->whereHas('userProfile', function ($query) {
                $query->where('profile_type', '=', 'patient');
            })->get();

        return view('Dashboard.doctor.prescriptions', compact('user', 'users', 'prescriptions'));
    }

    public function doctorPatients() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Some info of the logged User Id
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Return all Patients with their complete profile
        $users = new User();
        $users = $users::with('userProfile')
            ->whereHas('userProfile', function ($query) {
                $query->where('profile_type', '=', 'patient');
            })->get();

        return view('Dashboard.doctor.patients', compact('user', 'users'));
    }

    public function editPrescription($prescriptionId) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Some info of the logged User Id
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        $prescription = Prescription::find($prescriptionId);

        return view('Dashboard.doctor.edit-prescription', compact('user', 'prescription'));
    }

    public function editPrescriptionPost(Request $request, $prescriptionId) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Return just the fullname
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Get the prescription info
        $prescription = Prescription::find($prescriptionId);

        # Start Processing Update
        $validateData = Validator::make($request->all(),
            [
                'drug' => 'required',
                'interval' => 'required',
                'report' => 'required',
            ]
        );

        # If the validation fails, return error response in a view
        if ($validateData->fails()) {

            # withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validateData->messages());
        } else {
            Prescription::where('id', $prescriptionId)->update(array(
                'drug' => $request->input('drug'),
                'interval' => $request->input('interval'),
                'report' => $request->input('report')
            ));

            $message = 'Prescription Edit successfully';

            return view('Dashboard.doctor.edit-prescription', compact(
                    'user', 'prescriptionId', 'prescription', 'message'
                )
            );
        }
    }

    public function deletePrescription($prescriptionId) {
        $prescription = Prescription::find($prescriptionId);
        $prescription->delete();

        return redirect('/doctor-prescription');
    }
}
