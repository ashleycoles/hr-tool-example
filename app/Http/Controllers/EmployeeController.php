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

    public function create(Request $request)
    {
        // Exists allows us to check that a value exists within the database
        //exists:tablename,columnname
        $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'prefix' => 'required|string|max:255',
                'number' => 'required|integer|min:0',
                'notes' => 'string|max:1000',
                'contract_id' => 'integer|exists:contracts,id'
            ]
        );

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->prefix = $request->prefix;
        $employee->number = $request->number;
        $employee->notes = $request->notes;
        $employee->contract_id = $request->contract_id;

        if ($employee->save()) {
            return response()->json([
                'message' => 'Employee created',
                'success' => true
            ], 201);
        }

        return response()->json([
            'message' => 'Employee creation failed',
            'success' => false
        ], 500);
    }
}
