<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
     protected $table='recinto';

    protected $primaryKey='idrecinto';

    public $timestamps = false;

 protected $fillable = [

    	'idrecinto',
    	'nombre',
    	'totvotantes',
    	'idparroquia'
    	
    ];

    protected $guarded =[
    	
    ];
}
