<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index() {
        $data = Employee::all();
        return $data;
    }

    public function show($id) {
        $data = Employee::findOrFail($id);
        return $data;
    }

    public function store(Request $request) {
        return Employee::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        return $employee->update($request->all());
    }

    public function destroy($id) {
        Employee::destroy($id);
        return response("Successfully Deleted!", 200);
    }
}
