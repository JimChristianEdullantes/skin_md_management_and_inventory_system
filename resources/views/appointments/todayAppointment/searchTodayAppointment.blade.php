@extends('layouts.app')

@section('title')
      Today/Appointments/Search
@endsection

@section('content')

      <div class="main-content">    

            <button class="appointment"><a href="{{route('todayAppointment')}}">TODAY</a></button>
            <button class="appointment"><a href="{{route('weekAppointment')}}">THIS WEEK</a></button>
            <button class="appointment"><a href="{{route('monthAppointment')}}">THIS MONTH</a></button>
            <button class="appointment"><a href="{{route('appointment.index')}}">ALL</a></button>                   
            <div class="search-appointments">
                   <form action="{{route('searchPatientTodayAppointment')}}" method="get" class="search-name">
                        <input type="text" name="name" placeholder="Search Appointment">
                        <button type="submit"><i class='bx bx-search' ></i></button>
                  </form>

            </div>

            <button class="add_appointment"><a href="{{route('showPatientsForAppointments')}}">ADD APPOINTMENT</a></button>

            <table class="content-table">
                  <thead>
                        <tr>
                              <th>Name</th>
                              <th>Phone Number</th>
                              <th>Date and Time</th>
                              <th>Actions</th>
                        </tr>
                  </thead>

                  <tbody>

                        @foreach($appointments as $appointment)
                              @foreach($patients_fname as $patient)
                                    @if($appointment->patient_id == $patient->id)
                                          <tr>
                                                <td>     
                                                      
                                                            {{$patient->patient_firstname}} {{$patient->patient_lastname}}
                                                            
                                                </td>

                                                <td>      
                                                      {{$patient->patient_phone_number}}     
                                                </td>
                                                <td>{{Carbon\Carbon::create($appointment->date)->toDayDateTimeString()}}</td>
                                    
                                                <td>
                                                      <form id="delete-user" action="{{route('appointment.destroy', $appointment->id)}}" method="POST">
                                                            @csrf 
                                                            {{method_field('DELETE')}}

                                                            <a href="{{route('appointment.edit', $appointment->id)}}"><i class='bx bx-edit'></i></a>
                                                            <button type="submit">
                                                                        <i class='bx bxs-trash' ></i>
                                                            </button>
                                                      </form>
                                                
                                                </td>
                                          </tr>
                                    @endif 
                              @endforeach

                        @endforeach

                        @foreach($appointments as $appointment)
                              @foreach($patients_lname as $patient)
                                    @if($appointment->patient_id == $patient->id)
                                          <tr>
                                                <td>     
                                                      
                                                            {{$patient->patient_firstname}} {{$patient->patient_lastname}}
                                                            
                                                </td>
                                                <td>{{Carbon\Carbon::create($appointment->date)->toDayDateTimeString()}}</td>
                                    
                                                <td>
                                                      <form id="delete-user" action="{{route('appointment.destroy', $appointment->id)}}" method="POST">
                                                            @csrf 
                                                            {{method_field('DELETE')}}

                                                            <a href="{{route('appointment.edit', $appointment->id)}}"><i class='bx bx-edit'></i></a>
                                                            <button type="submit">
                                                                        <i class='bx bxs-trash' ></i>
                                                            </button>
                                                      </form>
                                                
                                                </td>
                                          </tr>
                                    @endif 
                              @endforeach

                        @endforeach

                  </tbody>
      
            </table>

            <div class="paginate">

            </div>

      </div>


@endsection