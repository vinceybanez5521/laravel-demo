<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeMySqlRepository;
use App\Repositories\EmployeeRepositoryInterface as RepositoriesEmployeeRepositoryInterface;
use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    /* public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    } */

    // private $employeeMySqlRepository;
    private $employeeRepositoryInterface;

    // public function __construct(EmployeeMySqlRepository $employeeMySqlRepository)
    public function __construct(EmployeeRepositoryInterface $employeeRepositoryInterface)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->employeeRepositoryInterface = $employeeRepositoryInterface;
    }

    public function index()
    {
        /*
        $data = Employee::all(); // Eloquent (Object Relational Mapping or ORM for Laravel)
        $data = Employee::where('age', '>', 0)->get();
        $data = Employee::where('first_name', 'LIKE', 'j%')->get();
        $data = Employee::select()->get(); // SELECT * FROM employees
        $data = Employee::select()->where('age', '>', 0)->get(); 
        // SELECT first_name FROM employees
        $data = Employee::select('first_name')->where('age', '>', 0)->groupBy('id')->get();
        $data = Employee::select()->where('age', '>=', 0)->count();
        $data = Employee::where('age', '>=', 0)->orderBy('first_name')->get();
        
        // Query Builder
        $data = DB::table('employees')->select('*')->get();
        $data = DB::select("SELECT * FROM employees");
        
        $data = Employee::paginate(10);
        
        // dd($data);
        */

        $data = $this->employeeRepositoryInterface->all();
        return view("employee.index", ['employees' => $data]);
    }

    public function show($id)
    {
        /*
        $data = Employee::where('id', $id)->first();
        $data = Employee::findOrFail($id);
        // $data->full_name = "John";
        // dd($data);
        */
        $data = $this->employeeRepositoryInterface->findById($id);
        return view("employee.show", ['employee' => $data]);
    }

    public function create()
    {
        return view('employee.create');
    }

    /* public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
        ]);

        Employee::create($validated);
        return redirect()->route('employee.index');
    } */

    public function store()
    {
        $this->employeeRepositoryInterface->store();
        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        // $data = Employee::findOrFail($id);
        $data = $this->employeeRepositoryInterface->findById($id);
        return view('employee.edit', ['employee' => $data]);
    }

    /* public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
        ]);

        $employee->update($validated);
        return redirect()->route('employee.show', ['id' => $employee->id]);
    } */

    public function update($id)
    {
        $this->employeeRepositoryInterface->update($id);
        return redirect()->route('employee.show', ['id' => $id]);
    }

    /* public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    } */

    public function destroy($id)
    {
        $this->employeeRepositoryInterface->delete($id);
        return redirect()->route('employee.index');
    }
}
