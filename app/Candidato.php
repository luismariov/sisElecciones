<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
     protected $table='candidato';

    protected $primaryKey='idcandidato';

    public $timestamps = false;

 protected $fillable = [

    	'idcandidato',
    	'nombre',
    	'iddignidad'
    	
    ];

    protected $guarded =[
    	
    ];
}
