<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSlots extends Model
{
    use HasFactory;


protected $table="slots";

public $timestamps = false;

protected $fillable = [

        'day',
        'time',
        'status',
        'user_id'
    ];

    
}
