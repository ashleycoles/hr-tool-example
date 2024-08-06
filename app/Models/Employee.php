<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    public $hidden = ['created_at', 'updated_at', 'contract_id'];

    // Think carefully about what you call the relationship method. Should it be singular
    // or plural?
    // If it's singular, it returns BelongsTo
    // If it's plural, it returns HasMany
    // One to many relationship

    // Method name is contract singular because an employee can only have 1 contract
    // Because this method is called contract, and it returns a BelongsTo relationship
    // Laravel assumes that the employees table has a contract_id field
    public function contract(): BelongsTo
    {
        // This employee belongs to a contract
        return $this->belongsTo(Contract::class);
    }
}
