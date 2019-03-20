<?php

namespace sisElecciones\Http\Controllers;

use Illuminate\Http\Request;

use sisElecciones\Http\Requests;

use sisElecciones\Provincia;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\ProvinciaFormRequest;
use DB;

class ProvinciaController extends Controller
{


	public function __construct()
	{

	}

	public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$provincias=DB::table('provincia')->where('nombre','LIKE','%'.$query.'%')
			->orderBy('idprovincia','asc')
			->paginate(4);
			return view('sitios.provincias.index',["provincias"=>$provincias, "searchText"=>$query]);

		}

	}

	public function create()
    {
    	return view('sitios.provincias.create');
    }

    public function store(ProvinciaFormRequest $request)
    {
    	$provincia = new Provincia;
    	$provincia->nombre=$request->get('nombre');
    	$provincia->save();
    	return Redirect::to('sitios/provincias');
    }

    public function show($id)
    {
    	return view("sitios.provincias.show",["provincia"=>Provincia::findOrFail($id)]);
    }


    public function edit($id)
    {
    		return view("sitios.provincias.edit",["provincia"=>Provincia::findOrFail($id)]);
    }

    public function update(ProvinciaFormRequest $request, $id)
    { 
    		$provincia = Provincia::findOrFail($id);
    		$provincia->nombre=$request->get('nombre');
    		$provincia->update();
    		return Redirect::to('sitios/provincias');
    }

     public function destroy($id)
    {
    		$provincia = Provincia::findOrFail($id);
    		$categoria->delete();
    		return Redirect::to('sitios/provincias');
    }
    
}
