<?php

namespace sisElecciones\Http\Controllers;

use Illuminate\Http\Request;

use sisElecciones\Http\Requests;
use sisElecciones\Dignidad;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\DignidadFormRequest;
use DB;

class DignidadController extends Controller
{
    
	public function __construct()
	{

	}

	public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$dignidades=DB::table('dignidad')->where('nombre','LIKE','%'.$query.'%')
			->orderBy('iddignidad','asc')
			->paginate(4);
			return view('personas.dignidades.index',["dignidades"=>$dignidades, "searchText"=>$query]);

		}

	}

	public function create()
    {
    	$provincias=DB::table('provincia')->get();
        $cantones=DB::table('canton')->get();
        $juntas=DB::table('parroquia')->where('tipo','=','rural')->get();
    	return view('personas.dignidades.create',["provincias"=>$provincias,"cantones"=>$cantones,"juntas"=>$juntas]);
    }

    public function store(DignidadFormRequest $request)
    {
    	$dignidad = new Dignidad;
    	$dignidad->nombre=$request->get('nombre');
        $dignidad->lugar=$request->get('lugar');
    	$dignidad->save();
    	return Redirect::to('personas/dignidades');
    }

    public function show($id)
    {
    	return view("personas.dignidades.show",["dignidad"=>Dignidad::findOrFail($id)]);
    }


    public function edit($id)
    {
    		return view("personas.dignidades.edit",["dignidad"=>Dignidad::findOrFail($id)]);
    }

    public function update(CantonFormRequest $request, $id)
    { 
    		$dignidad = Dignidad::findOrFail($id);
    		$dignidad->nombre=$request->get('nombre');
            $dignidad->lugar=$request->get('lugar');
    		$dignidad->update();
    		return Redirect::to('personas/dignidades');
    }

     public function destroy($id)
    {
    		$dignidad = Dignidad::findOrFail($id);
    		$dignidad->delete();
    		return Redirect::to('personas/dignidades');
    }
}
