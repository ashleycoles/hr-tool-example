<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function all()
    {
        // The with method allows us to load a models relationships
        // It is safe to hide foreignIds with makeHidden because it runs after the query has executed
        $employees = Employee::with('contract:id,name')->get()->makeHidden(['notes']);

        return response()->json([
            'message' => 'Employees retrieved',
            'success' => true,
            'data' => $employees
        ]);
    }
}
