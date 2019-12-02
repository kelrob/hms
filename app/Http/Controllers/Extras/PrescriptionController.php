<?php

namespace App\Http\Controllers\Extras;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
class PrescriptionController extends Controller
{
    public function newPrescription(Request $request) {

        # Get the logged in User Id
        $loggedUser = Sentinel::getUser();

        $prescription = new Prescription;

        $prescription->user_id = $loggedUser->id;
        $prescription->patient_id = $request->input('patient');
        $prescription->drug = $request->input('drug');
        $prescription->interval = $request->input('interval');
        $prescription->report = $request->input('report');
        $prescription->save();

        $successMessage = 'Prescription Given successfully';
        return redirect('/doctor-prescription')->with('successMessage', $successMessage);

    }
}
