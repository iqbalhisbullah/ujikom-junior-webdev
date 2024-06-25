<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('name', 'asc')->get();
        return response()->json([
            'message'   => 'Successfully retrieved employee data',
            'data'      => $employees
        ], 200);
    }

    public function store(Request $request)
    {
        // validation
        $validated = $request->validate([
            'name'          => 'required|string|min:3|max:255',
            'address'       => 'nullable|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'phone_number'  => 'nullable|string|max:15',
            'position'      => 'nullable|string|max:255',
            'Employee_Number'    => 'nullable|int|max:100',
            'start_date'    => 'nullable|date'
        ]);

        // create new employee
        $employee = Employee::create($validated);

        return response()->json([
            'message'   => 'Successfully added new employee',
            'data'      => $employee
        ], 201);
    }

    public function show(string $id)
    {
        $employee = Employee::find($id);
        return response()->json([
            'message'   => 'Successfully retrieved employee detail',
            'data'      => $employee
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'          => 'required|string|min:3|max:255',
            'address'       => 'nullable|string|max:255',
            'email'         => 'required|email|unique:employees,email,' . $id,
            'phone_number'  => 'nullable|string|max:15',
            'position'      => 'nullable|string|max:255',
            'start_date'    => 'nullable|date'
        ]);

        $employee = Employee::find($id);
        $employee->update($validated);

        return response()->json([
            'message'   => 'Successfully updated employee data',
            'data'      => $employee
        ], 200);
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json([
            'message'   => 'Successfully deleted employee data',
            'data'      => $employee
        ], 200);
    }

}
