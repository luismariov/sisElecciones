<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    protected $table='parroquia';

    protected $primaryKey='idparroquia';

    public $timestamps = false;

 protected $fillable = [

    	'idparroquia',
    	'nombre',
    	'tipo',
    	'idcanton'
    	
    ];

    protected $guarded =[
    	
    ];

}
