<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function all()
    {
        // When using relationships we can use a mixture of with and makeHidden to exclude fields from the results
        // makeHidden works like normal, but will only hide fields on the model you started with
            // It will only allow you to hide stuff on a contract, not an employee
        // We can then specify which fields from the relationship we want by passing them into the with method
        // Make sure you select the foreignId otherwise Laravel will not be able to do the join
        $contracts = Contract::with('employees:id,first_name,last_name,contract_id')->get()->makeHidden(['created_at', 'updated_at']);

        return response()->json([
            'message' => 'Contracts received',
            'success' => true,
            'data' => $contracts
        ]);
    }
}
