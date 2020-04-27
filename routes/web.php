<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PublicController@index');
Route::get('/view-doctors', 'PublicController@doctors')->name('doctors');
Route::get('/view-departments', 'PublicController@departments')->name('departments');

# Route to Register the admin
Route::get('/admin-register', 'Security\AdminController@index');
Route::post('/admin-register', 'Security\AdminController@registerAdmin');

# Route to Login
Route::get('/login', 'Security\LoginController@index')->name('login');
Route::post('/login', 'Security\LoginController@loginUser')->name('login');
Route::post('/authenticate', 'Security\LoginController@authenticateAdmin');
Route::post('/change-password', 'Security\LoginController@changePassword');

# Captcha
Route::get('refreshcaptcha', 'Security\LoginController@refreshCaptcha');

# Route to Logout
Route::get('/logout', 'Security\LoginController@logout');


/**
 *  Dashboards
 */
# Admin Dashboard
Route::get('/admin', 'Dashboard\AdminController@index')->middleware('admin');
Route::get('/doctors', 'Dashboard\AdminController@doctors')->middleware('admin');
Route::get('/patients', 'Dashboard\AdminController@patients')->middleware('admin');
Route::post('/doctors/post', 'Dashboard\AdminController@registerDoctor')->middleware('admin');
Route::post('/patients/post', 'Dashboard\AdminController@registerPatient')->middleware('admin');
Route::get('/edit-doctor/{doctor_id}', 'Dashboard\AdminController@getDoctorInfo')->middleware('admin');
Route::get('/edit-patient/{patient_id}', 'Dashboard\AdminController@getPatientInfo')->middleware('admin');
Route::post('/edit-doctor/{doctor_id}', 'Dashboard\AdminController@updateDoctorInfo')->middleware('admin');
Route::post('/edit-patient/{patient_id}', 'Dashboard\AdminController@updatePatientInfo')->middleware('admin');
Route::get('/delete-doctor/{doctor_id}', 'Dashboard\AdminController@deleteDoctorInfo')->middleware('admin');
Route::get('/delete-patient/{patient}', 'Dashboard\AdminController@deletePatientInfo')->middleware('admin');

# Doctor Dashboard
Route::get('/doctor-dashboard', 'Dashboard\DoctorController@index')->middleware('doctor');
Route::get('/doctor-appointment', 'Dashboard\DoctorController@doctorAppointment')->middleware('doctor');
Route::get('/doctor-prescription', 'Dashboard\DoctorController@doctorPrescription')->middleware('doctor');
Route::get('/edit-prescription/{prescription_id}', 'Dashboard\DoctorController@editPrescription')->middleware('doctor');
Route::post('/edit-prescription/{prescription_id}', 'Dashboard\DoctorController@editPrescriptionPost')->middleware('doctor');
Route::get('/doctor-patients', 'Dashboard\DoctorController@doctorPatients')->middleware('doctor');
Route::get('/approve-appointment/{appointment_id}/{option}', 'Extras\AppointmentController@approveAppointment')->middleware('doctor');
Route::post('/add-prescription/post', 'Extras\PrescriptionController@newPrescription')->middleware('doctor');
Route::get('/delete-prescription/{prescription_id}', 'Dashboard\DoctorController@deletePrescription')->middleware('doctor');


# Patient Dashboard
Route::get('/patient-dashboard', 'Dashboard\PatientController@index')->middleware('patient');
Route::get('/patient-appointment', 'Dashboard\PatientController@patientAppointment')->middleware('patient');
Route::get('/patient-prescription', 'Dashboard\PatientController@patientPrescription')->middleware('patient');
Route::post('/book-appointment/post', 'Extras\AppointmentController@bookAppointment')->middleware('patient');