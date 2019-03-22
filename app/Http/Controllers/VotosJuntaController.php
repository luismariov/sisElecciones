<?php

namespace sisElecciones\Http\Controllers;
use Illuminate\Http\Request;
use sisElecciones\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\VotosJuntaFormRequest;
use sisElecciones\VotosJunta;
use sisElecciones\Candidato;
use DB;




class VotosJuntaController extends Controller
{
  public function __construct()
  {

  }

  public function index(Request $request)
  {

    if ($request) {
      	//$candidatos= Candidato::all();
        $query=trim($request->get('searchText'));
  			$candidatos=DB::table('candidato as c')
  			->join('dignidad as d', 'c.iddignidad','=','d.iddignidad')
  			->select('c.idcandidato','c.nombre','d.nombre AS dignidad','d.lugar')
  			->where('c.nombre','LIKE','%'.$query.'%')
  			->orwhere('d.nombre','LIKE','%'.$query.'%')
  			->orderBy('c.idcandidato','asc')
  			->paginate(4);
  			return view('votos.votosjuntas.index',["candidatos"=>$candidatos, "searchText"=>$query]);

    }

  }


  public function create($id)
  {

    return view ('votos.votosjuntas.create');
    /*$candidatos=DB::table('candidato as c')
    ->join('dignidad as d', 'c.iddignidad','=','d.iddignidad')
    ->select('c.idcandidato','c.nombre','d.nombre AS dignidad','d.lugar')
    ->where('c.idcandidato','=',$id)
    ->paginate(4);
    return view ('votos.votosjuntas.create',["candidato"=>$candidatos]);*/
    //return view('votos.votosjuntas.create',['candidato'=>Candidato::all()]);
  }

  public function show ($id){

        return view ('votos.votosjuntas.create',[ 'candidato' => Candidato::findOrFail($id)]);

  }



}
