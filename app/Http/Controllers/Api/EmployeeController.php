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
            'message'   => 'Berhasil menampilkan data pegawai',
            'data'      => $employees
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // membuat validasi
        $validated = $request->validate([
            'name'          => 'required|string|min:3|max:255',
            'address'       => 'nullable|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'phone_number'  => 'nullable|string|max:15',
            'position'      => 'nullable|string|max:255',
            'start_date'    => 'nullable|date'
        ]);

        // membuat pegawai baru
        $employee = Employee::create($validated);

        return response()->json([
            'message'   => 'Berhasil menambahkan pegawai baru',
            'data'      => $employee
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return response()->json([
            'message'   => 'Berhasil menampilkan detail pegawai',
            'data'      => $employee
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
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
            'message'   => 'Berhasil mengupdate data pegawai',
            'data'      => $employee
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json([
            'message'   => 'Berhasil menghapus data pegawai',
            'data'      => $employee
        ], 200);
    }
}
