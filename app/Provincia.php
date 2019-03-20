<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table='provincia';
    protected $primaryKey='idprovincia';
    public $timestamps = false;

 protected $fillable = [

    	'idprovincia',
    	'nombre'

    ];

    protected $guarded =[

    ];
}
