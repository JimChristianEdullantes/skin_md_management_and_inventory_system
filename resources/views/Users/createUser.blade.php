@extends('layouts.app')

@section('title')
      Register/User
@endsection

@section('content')
<div class="main-content">

      <div class="regform">
            <h2>Register User</h2>                        
      </div>

      <div class="main">
            <form action="{{route('users.store')}}" method="POST">
            @csrf
                  <div id="name">
                        <h3 class="name">Name</h3>
                        <input class="firstname" type="text" name="first_name"><br/>
                        <label class="firstlabel">first name</label>

                        <input class="lastname" type="text" name="last_name">
                        <label class="lastlabel">last name</label>

                  </div>

                        <h3 class="name">Gender</h3>
                        <select class="option" name="gender">
                              <option disabled="disabled" selected="selected">--Choose Option</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                        </select>

                        <h3 class="name">Birthdate</h3>
                        <input class="birthdate" type="date" name="birthdate"/>

                        <h3 class="name">Address</h3>
                        <input class="address" type="text" name="address"/>

                        <h3 class="name">Phone Number</h3>
                        <input class="phone_number" type="text" name="phone_number"/>

                        <h3 class="name">Email</h3>
                        <input class="email" type="email" name="email"/>

                        <h3 class="name">Password</h3>
                        <input class="password" type="password" name="password"/>

                        <h3 class="name">Role</h3>
                        <select class="option" name="user_type">
                              <option disabled="disabled" selected="selected">--Choose Option</option>
                              <option value="1">Administrator</option>
                              <option value="2">Doctor</option>
                              <option value="3">Receptionist</option>
                        </select>

                        <input class="register" type="submit" value="Register"/>
            
                        <div class="cancel">
                              <a href="{{route('users.index')}}">Cancel</a>
                        </div>
            </form>

      </div>
</div>
@endsection