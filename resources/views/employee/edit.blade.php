@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>

    <form action="{{ route('employee.update', $employee) }}" method="POST">
        @method('PUT')
        @csrf

        <p>
            <label  class="form-label">First Name</label>
            <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" required>
        </p>
        <p>
            <label  class="form-label">Last Name</label>
            <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" required>
        </p>
        <p>
            <label  class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ $employee->email }}" class="form-control" required>
        </p>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection