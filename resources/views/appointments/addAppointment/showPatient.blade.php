@extends('layouts.app')

@section('content')

@if(session('patientAdded'))
	<script>
        alert('Patient Information has been added successfully');
    	</script>
@endif

@if(session('patientDeleted'))
	<script>
        alert('Patient Information has been deleted successfully');
    	</script>
@endif

@if(session('patientUpdated'))
	<script>
        alert('Patient Information has been updated successfully');
    	</script>
@endif



      <div class="main-content">                        
            <div class="search-user">
                   <form action="{{route('searchPatientForAppointment')}}" method="get" class="search-name">
                        <input type="text" name="name" placeholder="Search Patient">
                        <button type="submit"><i class='bx bx-search' ></i></button>
                  </form>

            </div>

            <button class="add_product"><a href="{{route('appointment.index')}}">BACK</a></button>

            <table class="content-table">
                  <thead>
                        <tr>
                              <th>Name</th>

                              <th>Action</th>
                        </tr>
                  </thead>

                  <tbody>

                        @forelse($patients as $patient)
                              <tr>
                                    <td>{{$patient->patient_firstname}} {{$patient->patient_lastname}}</td>
                                    
                                    <td>
                                          <button class="appointment_button"> <a class="appointment" href="{{route('createAppointment', $patient->id)}}">Add Appointment</i></a> </button>
                                    </td>
                              </tr>
                                    @empty
                                    <tr>
                                          <td> <h2>No Patient Information Available!</h2>></t>
                                    </tr>
                                    
                        @endforelse

                  </tbody>
      
            </table>

            <div class="paginate">

            </div>

      </div>


@endsection