<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    //public $timestamps = false;

    protected $fillable = [
        'contact_name', 
        'contact_email', 
        'contact_message',
        //'contact_date'
    ];

   
}
