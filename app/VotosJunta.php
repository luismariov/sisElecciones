<?php

namespace sisElecciones;

use Illuminate\Database\Eloquent\Model;

class VotosJunta extends Model
{

  protected $table='votosxjunta';

 protected $primaryKey='idvotosxjunta';

 public $timestamps = false;


 protected $fillable = [

    	'idcandidato',
    	'dignidad',
    	'canton',
      'parroquia',
      'recinto',
      'junta',
      'totalvotos'

    ];

    protected $guarded =[

    ];


}
