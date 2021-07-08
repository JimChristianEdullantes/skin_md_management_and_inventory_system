@extends('layouts.app')

@section('title')
      Search/User
@endsection

@section('content')

@if(session('Registered'))
	<script>
        alert('User is registered successfully');
    	</script>
@endif

@if(session('UserDeleted'))
	<script>
        alert('User has been deleted successfully');
    	</script>
@endif

@if(session('UserUpdated'))
	<script>
        alert('User has been updated successfully');
    	</script>
@endif



      <div class="main-content">                        
            <div class="search-user">
                   <form action="/ink" method="get" class="search-name">
                        <input type="text" name="name" placeholder="Search Name">
                        <button type="submit"><i class='bx bx-search' ></i></button>
                  </form>

            </div>

            <button class="add"><a href="{{route('users.create')}}">ADD USER</a></button>

            <table class="content-table">
                  <thead>
                        <tr>
                              <th>Name</th>
                              <th class="email">Email</th>
                              <th class="gender">Gender</th>
                              <th class="address">Address</th>
                              <th>Role</th>
                              <th>Actions</th>
                        </tr>
                  </thead>

                  <tbody> 

                        @foreach($users_fname as $user)
                              <tr>
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <td class="email">{{$user->email}}</td>
                                    <td class="gender">{{$user->gender}}</td>
                                    <td class="address">{{$user->address}}</td>

                                    @foreach($user_types as $user_type)
                                          @if($user->user_type_id == $user_type->id)
                                                <td>{{$user_type->user_type_name}}</td>
                                          @endif
                                    @endforeach
                                    <td>
                                          <form id="delete-user" action="{{route('users.destroy', $user->id)}}" method="POST">
                                                @csrf 
                                                {{method_field('DELETE')}}

                                                <a href="{{route('users.show', $user->id)}}"><i class='bx bxs-show'></i></a>
                                                <a href="{{route('users.edit', $user->id)}}"><i class='bx bx-edit'></i></a>
                                                <button type="submit">
                                                            <i class='bx bxs-trash' ></i>
                                                </button>
                                          </form>
                                    
                                    </td>
                              </tr>
                                    
                        @endforeach

                        @foreach($users_lname as $user)
                              <tr>
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <td class="email">{{$user->email}}</td>
                                    <td class="gender">{{$user->gender}}</td>
                                    <td class="address">{{$user->address}}</td>

                                    @foreach($user_types as $user_type)
                                          @if($user->user_type_id == $user_type->id)
                                                <td>{{$user_type->user_type_name}}</td>
                                          @endif
                                    @endforeach
                                    <td>
                                          <form id="delete-user" action="{{route('users.destroy', $user->id)}}" method="POST">
                                                @csrf 
                                                {{method_field('DELETE')}}

                                                <a href="{{route('users.show', $user->id)}}"><i class='bx bxs-show'></i></a>
                                                <a href="{{route('users.edit', $user->id)}}"><i class='bx bx-edit'></i></a>
                                                <button type="submit">
                                                            <i class='bx bxs-trash' ></i>
                                                </button>
                                          </form>
                                    
                                    </td>
                              </tr>

                        @endforeach

                        
                  </tbody>
                        
            </table>

      </div>
@endsection