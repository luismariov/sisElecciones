<?php

namespace sisElecciones\Http\Controllers;

use Illuminate\Http\Request;

use sisElecciones\Http\Requests;
use sisElecciones\Canton;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\CantonFormRequest;
use DB;

class CantonController extends Controller
{
    
	public function __construct()
	{

	}

	public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$cantones=DB::table('canton as c')
			->join('provincia as p', 'c.idprovincia','=','p.idprovincia')
			->select('c.nombre','c.idcanton','p.idprovincia','p.nombre AS provnombre')
			->where('c.nombre','LIKE','%'.$query.'%')
			->orwhere('p.nombre','LIKE','%'.$query.'%')
			->orderBy('c.idcanton','asc')
			->paginate(4);
			return view('sitios.cantones.index',["cantones"=>$cantones, "searchText"=>$query]);

		}

	}

	public function create()
    {
    	$provincias=DB::table('provincia')->get();
    	return view('sitios.cantones.create',['provincias'=>$provincias]);
    }

    public function store(cantonFormRequest $request)
    {
    	$canton = new Canton;
    	$canton->nombre=$request->get('nombre');
    	$canton->idprovincia=$request->get('idprovincia');
    	$canton->save();
    	return Redirect::to('sitios/cantones');
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
