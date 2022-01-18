<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    protected $table='hoteles';
    public $timestamps = false;  
    protected $primaryKey = 'hoteles_id';
}
