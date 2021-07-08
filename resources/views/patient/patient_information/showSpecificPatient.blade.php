@extends('layouts.app')

@section('title')
      Patient
@endsection

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

            <button class="patient_buttons"><a href="{{route('patients.index')}}"> <i class='bx bxs-caret-left-square'></i>   BACK</a></button>
            <button class="patient_buttons"><a href="#">APPOINTMENTS</a></button> 
            <button class="patient_buttons"><a href="#">PRESCRIPTIONS</a></button> 
            <button class="patient_buttons"><a href="#">DIAGNOSIS</a></button>                      

            <button class="patient_buttons"><a href="#">ADD DIAGNOSIS</a></button>
            
            <table class="content-table">
                  <thead>
                        <tr>
                              <th>Name</th>
                              <th>Sex</th>
                              <th>Birthdate</th>
                              <th>Address</th>
                              <th>Phone Number</th>
                              <th>Actions</th>
                        </tr>
                  </thead>

                  <tbody>

                              <tr>
                                    <td>{{$patient->patient_firstname}} {{$patient->patient_lastname}}</td>
                                    <td>{{$patient->patient_sex}}</td>
                                    <td>{{$patient->patient_birthdate}}</td>
                                    <td>{{$patient->patient_address}}</td>
                                    <td>{{$patient->patient_phone_number}}</td>
                                    
                                    <td>
                                          <form id="delete-user" action="{{route('patients.destroy', $patient->id)}}" method="POST">
                                                @csrf 
                                                {{method_field('DELETE')}}

                                                <a href="{{route('patients.show', $patient->id)}}"><i class='bx bxs-show'></i></a>
                                                <a href="{{route('patients.edit', $patient->id)}}"><i class='bx bx-edit'></i></a>
                                                <button type="submit">
                                                            <i class='bx bxs-trash' ></i>
                                                </button>
                                          </form>
                                    
                                    </td>

                  </tbody>
      
            </table>

            <div class="paginate">

            </div>

      </div>


@endsection