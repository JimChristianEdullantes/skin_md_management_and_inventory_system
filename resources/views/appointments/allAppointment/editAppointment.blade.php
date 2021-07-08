@extends('layouts.app')

@section('title')
      Edit/Appointment
@endsection

@section('content')
<div class="main-content">

      <div class="regform">
            <h2>Edit Appointment</h2>                        
      </div>

      <div class="main">
            <form action="{{route('appointment.update', $appointment->id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}
                        <h3 class="product_name">Name: </h3>
                        <h2 class="patient_name">{{$patient->patient_firstname}} {{$patient->patient_lastname}}</h2>
                  
                        <h3 class="product_name">Schedule:</h3>
                        <input class="email" type="datetime-local" name="date" value="{{$appointment->date}}"/>

                        <input class="register" type="submit" value="Update"/>
            
                        <div class="cancel">
                              <a href="{{route('appointment.index')}}">Cancel</a>
                        </div>
            </form>

      </div>
</div>
@endsection