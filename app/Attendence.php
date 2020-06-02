<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
     protected $fillable = [
        'user_id', 'attendence_date', 'attendence_year','attendence','edit_date','month',
    ]; 
}
