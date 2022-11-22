<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    

      protected $fillable = [
        'name',
        'refachat',
        'quantite',
        'created_at',
        'updated_at'
       
    ];
    public $timestamps = false;
    
    
}