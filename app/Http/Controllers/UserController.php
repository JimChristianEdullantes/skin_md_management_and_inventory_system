<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\UserType;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->join('employees', 'users.employee_id', '=', 'employees.id')->simplePaginate(10);
        $user_type = UserType::all();

        return view('Users.showUsers', ['users' => $users, 'user_types' => $user_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.createUser');
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
            'gender' => 'required:max: 7',
            'birthdate' => 'required',
            'address' => 'required:max: 150',
            'phone_number' => 'required|numeric',
            'email' => 'required',
            'password' => 'required:min:8',
            'user_type' => 'required|numeric',
        ]);
        
       
        $newEmployee = new Employee();
        $newEmployee->first_name = $request->first_name;
        $newEmployee->last_name = $request->last_name;
        $newEmployee->gender = $request->gender;
        $newEmployee->address = $request->address;
        $newEmployee->birthdate = $request->birthdate;
        $newEmployee->phone_number = $request->phone_number;
        $newEmployee->user_type_id = $request->user_type;
        $newEmployee->save();

        $latestEmployee = Employee::get()->last();

        $newUser = new User();
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->employee_id = $latestEmployee->id;
        $newUser->save();

        return redirect('users')->with('Registered', 'User is registered successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $employee = Employee::find($user->employee_id);
        $role = UserType::find($employee->user_type_id);
        return view('Users.showSpecificUser', ['user' => $user, 'employee' => $employee, 'role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $employee = Employee::find($user->employee_id);
        $role = UserType::find($employee->user_type_id);

        return view('Users.editUser', ['user' => $user, 'employee' => $employee, 'role' => $role]);
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
            'gender' => 'required:max: 7',
            'birthdate' => 'required',
            'address' => 'required:max: 150',
            'phone_number' => 'required|numeric',
            'email' => 'required',
            'password' => 'required:min:8',
            'user_type' => 'required|numeric',
        ]);
        
        $user = User::find($id);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $employee = Employee::find($user->employee_id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->birthdate = $request->birthdate;
        $employee->phone_number = $request->phone_number;
        $employee->user_type_id = $request->user_type;
        $employee->save();
      
        return redirect('users')->with('UserUpdated', 'User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $employee = Employee::find($user->employee_id);
        $employee->delete();

        return redirect('users')->with('UserDeleted', 'User has been deleted successfully');
    }

    
}
