<?php

namespace App\Http\Controllers\Extras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Appointment;
use Sentinel;

class AppointmentController extends Controller
{
    public function bookAppointment(Request $request) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        $appointment = new Appointment;

        $appointment->user_id = $request->input('doctor');
        $appointment->patient_id = $loggedUser->id;
        $appointment->appointment_date = $request->input('date');
        $appointment->save();

        $successMessage = 'Appointment Booked successfully';
        return redirect('/patient-appointment')->with('successMessage', $successMessage);
    }

    public function approveAppointment($appointmentId, $option) {

        if ($option == 'cancel') {
            $status = 2;
        } else if ($option == 'approve') {
            $status = 1;
        }

        $appointment = Appointment::find($appointmentId);
        $appointment->status = $status;

        $appointment->save();
        return redirect('/doctor-appointment');
    }
}
