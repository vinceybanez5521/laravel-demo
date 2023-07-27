@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Profile</h1>
    <h3>{{ $employee->id }}</h3>
    <h3>{{ $employee->first_name }}</h3>
    <h3>{{ $employee->last_name }}</h3>
    <h3>{{ $employee->email }}</h3>

    <p>
        <a href="{{ route('employee.index') }}" class="btn btn-primary">Employee List</a>
    </p>
    @if (Auth::user())
    <p>
        <a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-success">Edit</a>
    </p>
    <p>
    <form action="{{ route('employee.destroy', $employee) }}" method="POST" id="deleteForm">
        @method('DELETE')
        @csrf

        <a href="#" onclick="document.getElementById('deleteForm').submit()" class="btn btn-danger">Delete</a>
    </form>
    </p>
    @endif
</div>
@endsection