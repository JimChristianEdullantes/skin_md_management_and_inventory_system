<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\UserType;
use App\Models\PatientInformationController;
use App\Models\Product;
use App\Models\PatientInformation;
use App\Models\Appointment;

use Carbon\Carbon;

class SearchController extends Controller
{


    public function searchUser(Request $request)
    {
        if($request->name == null)
        {
            return redirect('users');
        }
        
        $name = $request->name;
        $users_fname = Employee::join('users', 'users.employee_id', '=', 'employees.id')->where('first_name', 'like',  '%'.$name.'%')->get();
        $users_lname = Employee::join('users', 'users.employee_id', '=', 'employees.id')->where('last_name', 'like',  '%'.$name.'%')->get();

        $userType = UserType::all();

        return view('Users.searchUser', ['users_fname' => $users_fname, 'users_lname' => $users_lname, 'user_types' => $userType]);
    }

    public function searchProduct(Request $request)
    {
        if($request->name == null)
        {
            return redirect('inventory');
        }

        $products = Product::where('product_name', 'like', '%'.$request->name.'%')->get();

        return view('inventory.showInventory', ['products' => $products]);
    }

    public function searchPatient(Request $request)
    {
        if($request->name == null)
        {
            return redirect('patients');
        }
        
        $name = $request->name;
        $patients_fname = PatientInformation::where('patient_firstname', 'like',  '%'.$name.'%')->get();
        $patients_lname = PatientInformation::where('patient_lastname', 'like',  '%'.$name.'%')->get();

        return view('patient.patient_information.searchPatient', ['patients_fname' => $patients_fname, 'patients_lname' => $patients_lname]);
    }

    public function searchPatientForAppointment(Request $request)
    {
        if($request->name == null)
        {
            return redirect('add_appointment/patients');
        }
        
        $name = $request->name;
        $patients_fname = PatientInformation::where('patient_firstname', 'like',  '%'.$name.'%')->get();
        $patients_lname = PatientInformation::where('patient_lastname', 'like',  '%'.$name.'%')->get();


        return view('appointments.addAppointment.searchPatientForAppointment', ['patients_fname' => $patients_fname, 'patients_lname' => $patients_lname]);

    
    }

    public function searchAllAppointment(Request $request)
    {
        if($request->name == null)
        {
            return redirect('appointment');
        }

        $name = $request->name;
        $patients_fname = PatientInformation::where('patient_firstname', 'like',  '%'.$name.'%')->get();
        $patients_lname = PatientInformation::where('patient_lastname', 'like',  '%'.$name.'%')->get();

        $appointments = Appointment::whereBetween('date', [Carbon::today(), Carbon::now()->endOfYear()])->get();

        return view('appointments.allAppointment.searchAllAppointment', ['patients_fname' => $patients_fname, 'patients_lname' => $patients_lname, 'appointments' => $appointments]);
    }

    public function searchPatientTodayAppointment(Request $request)
    {
        if($request->name == null)
        {
            return redirect('appointments/today');
        }
        $name = $request->name;
        $patients_fname = PatientInformation::where('patient_firstname', 'like',  '%'.$name.'%')->get();
        $patients_lname = PatientInformation::where('patient_lastname', 'like',  '%'.$name.'%')->get();

        $appointments = Appointment::whereDate('date', date('Y-m-d'))->get();

        return view('appointments.todayAppointment.searchTodayAppointment', ['patients_fname' => $patients_fname, 'patients_lname' => $patients_lname, 'appointments' => $appointments]);
    }

    public function searchPatientWeekAppointment(Request $request)
    {
        if($request->name == null)
        {
            return redirect('appointments/week');
        }
        $name = $request->name;
        $patients_fname = PatientInformation::where('patient_firstname', 'like',  '%'.$name.'%')->get();
        $patients_lname = PatientInformation::where('patient_lastname', 'like',  '%'.$name.'%')->get();

        $appointments = Appointment::whereBetween('date', [Carbon::today(), Carbon::now()->endOfWeek()])->get();

        return view('appointments.weekAppointment.searchWeekAppointment', ['patients_fname' => $patients_fname, 'patients_lname' => $patients_lname, 'appointments' => $appointments]);
    }

    public function searchPatientMonthAppointment(Request $request)
    {
        if($request->name == null)
        {
            return redirect('appointments/month');
        }
        $name = $request->name;
        $patients_fname = PatientInformation::where('patient_firstname', 'like',  '%'.$name.'%')->get();
        $patients_lname = PatientInformation::where('patient_lastname', 'like',  '%'.$name.'%')->get();

        $appointments = Appointment::whereBetween('date', [Carbon::today(), Carbon::now()->endOfMonth()])->get();

        return view('appointments.monthAppointment.searchMonthAppointment', ['patients_fname' => $patients_fname, 'patients_lname' => $patients_lname, 'appointments' => $appointments]);
    }

    
    
}
