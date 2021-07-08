@extends('layouts.app')

@section('content')

      <div class="main-content">                        
            <div class="search-user">
                   <form action="{{route('searchPatientForAppointment')}}" method="get" class="search-name">
                        <input type="text" name="name" placeholder="Search Patient">
                        <button type="submit"><i class='bx bx-search' ></i></button>
                  </form>

            </div>

            <button class="add_product"><a href="{{route('showPatientsForAppointments')}}">BACK</a></button>

            <table class="content-table">
                  <thead>
                        <tr>
                              <th>Name</th>

                              <th>Action</th>
                        </tr>
                  </thead>

                  <tbody>

                        @foreach($patients_fname as $patient)
                              <tr>
                                    <td>{{$patient->patient_firstname}} {{$patient->patient_lastname}}</td>
                                    
                                    <td>
                                          <button class="appointment_button"> <a class="appointment" href="{{route('createAppointment', $patient->id)}}">Add Appointment</i></a> </button>
                                    </td>
                              </tr>

                                    
                        @endforeach

                        @foreach($patients_lname as $patient)
                              <tr>
                                    <td>{{$patient->patient_firstname}} {{$patient->patient_lastname}}</td>
                                    
                                    <td>
                                          <button class="appointment_button"> <a class="appointment" href="{{route('createAppointment', $patient->id)}}">Add Appointment</i></a> </button>
                                    </td>
                              </tr>
                                    
                        @endforeach

                  </tbody>
      
            </table>

            <div class="paginate">

            </div>

      </div>


@endsection