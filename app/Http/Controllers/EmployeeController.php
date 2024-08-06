<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function all()
    {
        // The with method allows us to load a models relationships
        $employees = Employee::with('contract')->get();

        return response()->json([
            'message' => 'Employees retrieved',
            'success' => true,
            'data' => $employees
        ]);
    }
}
