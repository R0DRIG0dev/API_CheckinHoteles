<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table='documentos';
    public $timestamps = false;  
    protected $primaryKey = 'documentos_id';
}