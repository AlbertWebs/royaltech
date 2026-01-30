<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaptopHireRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'pickup_date',
        'number_of_laptops',
        'desired_specs',
        'status',
        'admin_notes',
        'email_sent',
        'email_error'
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'number_of_laptops' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
