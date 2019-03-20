<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class Dignidad extends Model
{
    
     protected $table='dignidad';

    protected $primaryKey='iddignidad';

    public $timestamps = false;

 protected $fillable = [

    	'iddignidad',
    	'nombre',
        'lugar'
    	
    ];

    protected $guarded =[
    	
    ];
}
