@extends('layouts.app')

@section('title')
      Patients
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
            <div class="search-user">
                   <form action="/search_patient" method="get" class="search-name">
                        <input type="text" name="name" placeholder="Search Patient">
                        <button type="submit"><i class='bx bx-search' ></i></button>
                  </form>

            </div>

            <button class="add_product"><a href="{{route('patients.create')}}">ADD PATIENT</a></button>

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

                        @forelse($patients as $patient)
                              <tr>
                                    <td>{{$patient->patient_firstname}} {{$patient->patient_lastname}}</td>
                                    <td>{{$patient->patient_sex}}</td>
                                    <td>{{Carbon\Carbon::create($patient->patient_birthdate)->toFormattedDateString();}}</td>
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