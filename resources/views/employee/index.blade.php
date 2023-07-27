{{-- @include('partials.header') --}}
@extends('layouts.app')

{{-- The content will be injected in @yield('content') in /layouts/app.blade.php --}}
@section('content')
<div class="container">
    @if (Auth::user())
    <a href="{{ route('employee.create') }}" class="btn btn-primary mb-3">Add New Employee</a>
    @endif

    <h1>Employees</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name . " " . $employee->last_name }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        {{-- <a href="/employees/{{ $employee->id }}">View</a> --}}
                        <a href="{{ route('employee.show', ['id' => $employee->id]) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $employees->links() }}
    </div>


</div>
@endsection
{{-- @include('partials.footer') --}}