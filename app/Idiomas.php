<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    protected $table='idiomas';
    public $timestamps = false;  
    protected $primaryKey = 'idiomas_id';
}
