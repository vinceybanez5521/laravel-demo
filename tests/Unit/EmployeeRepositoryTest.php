<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Repositories\EmployeeMySqlRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeRepositoryTest extends TestCase
{
    private $employeeRepository;

    public function setUp(): void {
        parent::setUp();
        $this->employeeRepository = new EmployeeMySqlRepository();
    }

    public function test_all() {
        $employees = $this->employeeRepository->all();
        $this->assertTrue(count($employees) > 0);
    }

    public function test_find_by_id() {
        $employee = $this->employeeRepository->findById(1);
        $this->assertTrue($employee != null);
    }

    public function test_store_destroy() {
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $email = fake()->unique()->safeEmail();
        
        $response = $this->post('/employees/store', [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ]);

        $employee = Employee::where('email', $email)->first();
        $this->assertTrue($employee != null);
        
        $employee = Employee::where('email', $email)->first();
        $this->employeeRepository->delete($employee->id);
        $this->assertFalse($employee == null);
    }
}
