<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\PatientInformation;
use Carbon\Carbon;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::whereBetween('date', [Carbon::today(), Carbon::now()->endOfYear()])->simplePaginate(10);
        $patients = PatientInformation::all();

        return view('appointments.allAppointment.showAppointments', ['appointments' => $appointments, 'patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $patient = PatientInformation::find($appointment->patient_id);

        return view('appointments.allAppointment.editAppointment', ['appointment' => $appointment, 'patient' => $patient]);
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
            "date" => 'required',
        ]);

        $appointment = Appointment::find($id);
        $appointment->date = $request->date;
        $appointment->save();

        return redirect('appointment')->with('appointmentUpdated', 'Appointment schedule has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return redirect('appointment')->with('appointmentDeleted', 'Appointment has been removed');
    }

    public function showPatients()
    {
        $patients = Patientinformation::all();
        return view('appointments.addAppointment.showPatient', ['patients' => $patients]);

    }

    public function createAppointment($id)
    {
   
        $patient = PatientInformation::find($id);
        return view('appointments.addAppointment.addAppointment', ['patient' => $patient]);
    }
    
    public function storeAppointment(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
        ]);

        $appointment = new Appointment();
        $appointment->patient_id = $id;
        $appointment->date = $request->date;
        $appointment->save();

        return redirect('appointment')->with('appointmentAdded', 'Appointment has been added successfully');
    }

    public function todayAppointment()
    {
        $appointments = Appointment::whereDate('date', date('Y-m-d'))->simplePaginate(10);
        $patients = PatientInformation::all();

        return view('appointments.todayAppointment.showTodayAppointment', ['appointments' => $appointments, 'patients' => $patients]);
    }

    public function weekAppointment()
    {
        $appointments = Appointment::whereBetween('date', [Carbon::today(), Carbon::now()->endOfWeek()])->simplePaginate(10);
        $patients = PatientInformation::all();
        return view('appointments.weekAppointment.showWeekAppointment', ['appointments' => $appointments, 'patients' => $patients]);
    }

    public function monthAppointment()
    {
        $appointments = Appointment::whereBetween('date', [Carbon::today(), Carbon::now()->endOfMonth()])->simplePaginate(10);
        $patients = PatientInformation::all();
        return view('appointments.monthAppointment.showMonthAppointment', ['appointments' => $appointments, 'patients' => $patients]);
    }
}
