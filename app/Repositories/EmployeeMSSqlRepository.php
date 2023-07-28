<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\EmployeeRepositoryInterface;

class EmployeeMSSqlRepository implements EmployeeRepositoryInterface
{

    public function all()
    {
        return Employee::paginate(10);
    }

    public function findById($id)
    {
        return Employee::findOrFail($id);
    }

    public function update($id)
    {
        $validated = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
        ]);

        $employee = $this->findById($id);
        return $employee->update($validated);
    }

    public function store()
    {
        $validated = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
        ]);

        return Employee::create($validated);
    }

    public function delete($id)
    {
        return Employee::destroy($id);
    }
}
