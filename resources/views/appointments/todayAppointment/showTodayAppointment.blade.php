@extends('layouts.app')

@section('title')
      Today/Appointments
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

                        @forelse($appointments as $appointment)
                              <tr>

                                    <td>
                                          @foreach($patients as $patient)
                                                @if($appointment->patient_id == $patient->id)
                                                      {{$patient->patient_firstname}} {{$patient->patient_lastname}}
                                                @endif
                                          @endforeach
                                    </td>

                                    <td>
                                          @foreach($patients as $patient)
                                                @if($appointment->patient_id == $patient->id)
                                                      {{$patient->patient_phone_number}}
                                                @endif
                                          @endforeach
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
                                    @empty
                                    <tr>
                                          <td><h2>No Appointments available!</h2></t>
                                    </tr>
                        @endforelse

                  </tbody>
      
            </table>

            <div class="paginate">
                  {{$appointments->links()}}
            </div>

      </div>


@endsection