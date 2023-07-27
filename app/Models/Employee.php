<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees'; // explicitly specify which table this model connects to

    // These are the fields that can be filled out
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    // These are the fields that should be hidden or not fillable
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    // protected $guarded = []; // This will make all fields become fillable

    // These are fields that should be hidden from APIs
    protected $hidden = ['created_at', 'updated'];
}