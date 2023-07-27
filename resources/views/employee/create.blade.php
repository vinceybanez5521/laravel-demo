{{-- @include('partials.header') --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Employee</h1>

    <form action="{{ route('employee.store') }}" method="POST">
        @csrf

        <p>
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </p>
        <p>
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </p>
        <p>
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" required>
        </p>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

{{-- @include('partials.footer') --}}