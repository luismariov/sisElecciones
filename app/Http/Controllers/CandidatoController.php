<?php

namespace sisElecciones\Http\Controllers;
use Illuminate\Http\Request;
use sisElecciones\Http\Requests;
use sisElecciones\Candidato;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\CandidatoFormRequest;
use DB;

class CandidatoController extends Controller
{
    public function __construct()
	{

	}

	public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$candidatos=DB::table('candidato as c')
			->join('dignidad as d', 'c.iddignidad','=','d.iddignidad')
			->select('c.idcandidato','c.nombre','d.nombre AS dignidad','d.lugar')
			->where('c.nombre','LIKE','%'.$query.'%')
			->orwhere('d.nombre','LIKE','%'.$query.'%')
			->orderBy('c.idcandidato','asc')
			->paginate(4);
			return view('personas.candidatos.index',["candidatos"=>$candidatos, "searchText"=>$query]);

		}

	}

	public function create()
    {
    	$dignidad=DB::table('dignidad')->get();
    	return view('personas.candidatos.create',['dignidad'=>$dignidad]);
    }

    public function store(CandidatoFormRequest $request)
    {
    	$candidato = new Candidato;
    	$candidato->nombre=$request->get('nombre');
    	$candidato->iddignidad=$request->get('iddignidad');
    	$candidato->save();
    	return Redirect::to('personas/candidatos');
    }

    public function show($id)
    {
    	return view("sitios.cantones.show",["canton"=>Canton::findOrFail($id)]);
    }


    public function edit($id)
    {
    		return view("sitios.cantones.edit",["canton"=>Canton::findOrFail($id)]);
    }

    public function update(CantonFormRequest $request, $id)
    {
    		$canton = Canton::findOrFail($id);
    		$canton->nombre=$request->get('nombre');
    		$canton->idprovincia=$request->get('idprovincia');
    		$canton->update();
    		return Redirect::to('sitios/cantones');
    }

     public function destroy($id)
    {
    		$canton = Canton::findOrFail($id);
    		$canton->delete();
    		return Redirect::to('sitios/cantones');
    }



}
