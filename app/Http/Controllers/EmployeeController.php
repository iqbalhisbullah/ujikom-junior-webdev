<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel employee
        $employees = Employee::orderBy('name')->get();
        $data['employees'] = $employees;

        return view('pages.employee', $data);
    }
}
