<?php

namespace sisElecciones\Http\Controllers;

use Illuminate\Http\Request;

use sisElecciones\Http\Requests;
use sisElecciones\Parroquia;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\ParroquiaFormRequest;
use DB;

class ParroquiaController extends Controller
{
    
    
	public function __construct()
	{

	}

	public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$parroquias=DB::table('parroquia as p')
			->join('canton as c', 'p.idcanton','=','c.idcanton')
			->select('p.nombre', 'p.idparroquia','p.tipo','c.nombre AS cantnombre')
			->where('p.nombre','LIKE','%'.$query.'%')
			->orwhere('c.nombre','LIKE','%'.$query.'%')
			->orderBy('p.idparroquia','asc')
			->paginate(4);
			return view('sitios.parroquias.index',["parroquias"=>$parroquias, "searchText"=>$query]);

		}

	}

	public function create()
    {
    	$cantones=DB::table('canton')->get();
    	return view('sitios.parroquias.create',['cantones'=>$cantones]);
    }

    public function store(ParroquiaFormRequest $request)
    {
    	$parroquia = new Parroquia;
    	$parroquia->nombre=$request->get('nombre');
    	$parroquia->tipo=$request->get('tipo');
    	$parroquia->idcanton=$request->get('idcanton');
    	$parroquia->save();
    	return Redirect::to('sitios/parroquias');
    }

    public function show($id)
    {
    	return view("sitios.parroquias.show",["parroquia"=>Parroquia::findOrFail($id)]);
    }


    public function edit($id)
    {
    		return view("sitios.parroquias.edit",["parroquia"=>Parroquia::findOrFail($id)]);
    }

    public function update(ParroquiaFormRequest $request, $id)
    { 
    		$parroquia = Parroquia::findOrFail($id);
    		$parroquia->nombre=$request->get('nombre');
    		$parroquia->tipo=$request->get('tipo');
    		$parroquia->idcanton=$request->get('idcanton');
    		$parroquia->update();
    		return Redirect::to('sitios/parroquias');
    }

     public function destroy($id)
    {
    		$parroquia = Parroquia::findOrFail($id);
    		$parroquia->delete();
    		return Redirect::to('sitios/parroquias');
    }
}
