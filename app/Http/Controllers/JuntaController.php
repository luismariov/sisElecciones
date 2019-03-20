<?php

namespace sisElecciones\Http\Controllers;

use Illuminate\Http\Request;

use sisElecciones\Http\Requests;
use sisElecciones\Junta;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\JuntaFormRequest;
use DB;

class JuntaController extends Controller
{
    
	public function __construct()
	{

	}

	public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$juntas=DB::table('junta as j')
			->join('recinto as r', 'j.idrecinto','=','r.idrecinto')
			->join('parroquia as p', 'r.idparroquia','=','p.idparroquia')
			->select('j.idjunta','j.numero','j.tipo','r.nombre AS nombrerecinto','p.nombre AS nombreparroquia')
			->where('j.numero','LIKE','%'.$query.'%')
			->orwhere('r.nombre','LIKE','%'.$query.'%')
			->orderBy('j.idjunta','asc')
			->paginate(4);
			return view('sitios.juntas.index',["juntas"=>$juntas, "searchText"=>$query]);

		}

	}

	public function create()
    {
    	$recintos=DB::table('recinto')->get();
    	return view('sitios.juntas.create',['recintos'=>$recintos]);
    }

    public function store(JuntaFormRequest $request)
    {
    	$junta = new Junta;
    	$junta->numero=$request->get('numero');
    	$junta->tipo=$request->get('tipo');
    	$junta->idrecinto=$request->get('idrecinto');
    	$junta->save();
    	return Redirect::to('sitios/juntas');
    }

    public function show($id)
    {
    	return view("sitios.juntas.show",["junta"=>Junta::findOrFail($id)]);
    }


    public function edit($id)
    {
    	return view("sitios.juntas.edit",["junta"=>Junta::findOrFail($id)]);
    }

    public function update(JuntaFormRequest $request, $id)
    { 
    		$junta = Junta::findOrFail($id);
    		$junta->numero=$request->get('numero');
    		$junta->tipo=$request->get('tipo');
    		$junta->idrecinto=$request->get('idrecinto');
    		$junta->update();
    		return Redirect::to('sitios/juntas');
    }

     public function destroy($id)
    {
    		$junta = Junta::findOrFail($id);
    		$junta->delete();
    		return Redirect::to('sitios/juntas');
    }
}
