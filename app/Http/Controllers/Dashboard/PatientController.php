<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Appointment;

class PatientController extends Controller
{
    public function index() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        return view('Dashboard.patient.dashboard', compact('user'));
    }

    public function patientAppointment() {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Some info of the logged in user
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        # Return all Doctors with their complete profile
        $users = new User();
        $users = $users::with('userProfile')
            ->whereHas('userProfile', function ($query) {
                $query->where('profile_type', '=', 'doctor');
            })->get();

        # All Appointment
        $userAppointment = Appointment::where('patient_id', '=', $loggedUser->id)->get();

        return view('Dashboard.patient.appointments', compact('user', 'users', 'userAppointment'));
    }

    public function patientPrescription() {
        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        # Get the profile of the logged in User
        $profile = new UserProfile;
        $profile = $profile->find($loggedUser->id);

        # Some info of the logged in user
        $user = array("fullname" => $profile->fullname, "profile_type" => $profile->profile_type);

        $userPrescription = Prescription::where('patient_id', '=', $loggedUser->id)->get();
        return view('Dashboard.patient.prescription', compact('user', 'userPrescription'));
    }
}
