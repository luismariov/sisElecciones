<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class Junta extends Model
{
    
     protected $table='junta';

    protected $primaryKey='idjunta';

    public $timestamps = false;

 protected $fillable = [

    	'idjunta',
    	'numero',
    	'tipo',
    	'idrecinto'
    	
    ];

    protected $guarded =[
    	
    ];
}
