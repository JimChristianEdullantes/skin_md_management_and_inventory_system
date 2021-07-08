@extends('layouts.app')

@section('title')
      User
@endsection

@section('content')
<div class="main-content">

      <div class="user-header">
            <h2>USER INFORMATION</h2>
      </div>

      <div class="user-main">
            <h3>Name:</h3><p> {{$employee->first_name}} {{$employee->last_name}}</p>
            <h3>Gender:</h3><p> {{$employee->gender}}</p>
            <h3>Address:</h3><p> {{$employee->address}}</p>
            <h3>Birthdate:</h3><p> {{$employee->birthdate}}</p>
            <h3>Phone Number:</h3><p> {{$employee->phone_number}}</p>
            <h3>Email:</h3><p> {{$user->email}}</p>
            <h3>Role:</h3><p>{{$role->user_type_name}}</p>


            <a class="edit" href="{{route('users.edit', $user->id)}}">Edit</a><a class="back" href="{{route('users.index')}}">Back</a>
      <div>
</div>
@endsection