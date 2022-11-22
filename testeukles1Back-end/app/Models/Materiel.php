<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    
    protected $fillable = [
        'name',
        'refachat',
        'prix',
        'created_at',
        'updated_at'
       
    ];
    public $timestamps = false;
}
