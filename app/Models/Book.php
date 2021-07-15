<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

 protected $table= "patient_book";

 public $timestamps = false;

  protected $fillable = [
    
        'day',
        'user_id',
        'slot_id'
      
    ];

    public function slot(){

       return hasMany('App\Model\DoctorSlots','slot_id');

    }

}
