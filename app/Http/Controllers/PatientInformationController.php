<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientInformation;

class PatientInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patientinformation::all();
        return view('patient.patient_information.showPatientInformations', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.patient_information.addPatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required:max: 50',
            'last_name' => 'required:max: 50',
            'sex' => 'required:max: 7',
            'birthdate' => 'required',
            'address' => 'required:max: 150',
            'phone_number' => 'required|numeric',
        ]);
        
        $patient = new PatientInformation();
        $patient->patient_firstname = $request->first_name;
        $patient->patient_lastname = $request->last_name;
        $patient->patient_sex = $request->sex;
        $patient->patient_birthdate = $request->birthdate;
        $patient->patient_address = $request->address;
        $patient->patient_phone_number = $request->phone_number;
        $patient->save();

        return redirect('patients')->with('patientAdded', 'Patient Information has been added successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = PatientInformation::find($id);
        
        return view('patient.patient_information.showSpecificPatient', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = PatientInformation::find($id);

        return view('patient.patient_information.editPatient', ['patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required:max: 50',
            'last_name' => 'required:max: 50',
            'sex' => 'required:max: 7',
            'birthdate' => 'required',
            'address' => 'required:max: 150',
            'phone_number' => 'required|numeric',
        ]);

        $patient = PatientInformation::find($id);
        $patient->patient_firstname = $request->first_name;
        $patient->patient_lastname = $request->last_name;
        $patient->patient_sex = $request->sex;
        $patient->patient_birthdate = $request->birthdate;
        $patient->patient_address = $request->address;
        $patient->patient_phone_number = $request->phone_number;
        $patient->save();

        return redirect('patients')->with('patientUpdated', 'Patient Information has been added successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = PatientInformation::find($id);
        $patient->delete();

         return redirect('patients')->with('patientDeleted', 'Patient Information has been deleted successfully');
    }
}
