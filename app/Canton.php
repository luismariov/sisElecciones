<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    
    protected $table='canton';

    protected $primaryKey='idcanton';

    public $timestamps = false;

 protected $fillable = [

    	'idcanton',
    	'nombre',
    	'idprovincia'
    	
    ];

    protected $guarded =[
    	
    ];
}
