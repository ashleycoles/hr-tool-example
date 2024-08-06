<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;

    // Defining the inverse of the relationship
    // This allows us to use the relationship in both directions
    // The method in Employee lets us get an employee with their contract
    // This method allows us to get a contract, and it's employees

    // A contract has many employees, so the method name is plural
    // It returns a HasMany relationship
    public function employees(): HasMany
    {
        // This contract has many employees
        return $this->hasMany(Employee::class);
    }
}
