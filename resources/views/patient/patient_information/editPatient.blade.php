@extends('layouts.app')

@section('title')
     Edit/Patient
@endsection

@section('content')
<div class="main-content">

      <div class="regform">
            <h2>Patient Information</h2>                        
      </div>

      <div class="main">
            <form action="{{route('patients.update', $patient->id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
                  <div id="name">
                        <h3 class="name">Name</h3>
                        <input class="firstname" type="text" name="first_name" value="{{$patient->patient_firstname}}"><br/>
                        <label class="firstlabel">first name</label>
                        
                        <input class="lastname" type="text" name="last_name" value="{{$patient->patient_lastname}}">
                        <label class="lastlabel">last name</label>
                        

                  </div>

                        <h3 class="name">Sex</h3>
                        <select class="option" name="sex">
                              <option disabled="disabled" selected="selected">--Choose Option</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                        </select>

                        <h3 class="name">Birthdate</h3>
                        <input class="birthdate" type="date" name="birthdate" value="{{$patient->patient_birthdate}}"/>

                        <h3 class="name">Address</h3>
                        <input class="address" type="text" name="address" value="{{$patient->patient_address}}"/>

                        <h3 class="name">Phone Number</h3>
                        <input class="phone_number" type="text" name="phone_number" value="{{$patient->patient_phone_number}}"/>

                        <input class="register" type="submit" value="Save"/>
      
                        <div class="cancel">
                              <a href="{{route('patients.index')}}">Cancel</a>
                        </div>
            </form>

      </div>
</div>
@endsection