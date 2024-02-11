<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'f_name',
        'm_name',
        'spouse',
        'contact',
        'blood_group',
        'gender',
        'salary',
        'dept_id',
        'join_date',
        'birth_date',
        'email',
        'address',
        'status',
    ];
    
}
