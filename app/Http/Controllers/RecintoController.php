<?php

namespace sisElecciones\Http\Controllers;

use Illuminate\Http\Request;

use sisElecciones\Http\Requests;
use sisElecciones\Recinto;
use Illuminate\Support\Facades\Redirect;
use sisElecciones\Http\Requests\RecintoFormRequest;
use DB;

class RecintoController extends Controller
{
    
    
	public function __construct()
	{

	}

	public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$recintos=DB::table('recinto as r')
			->join('parroquia as p', 'r.idparroquia','=','p.idparroquia')
			->select('r.idrecinto','r.nombre', 'r.totvotantes','p.nombre AS parronombre','p.tipo')
			->where('r.nombre','LIKE','%'.$query.'%')
			->orwhere('p.nombre','LIKE','%'.$query.'%')
			->orderBy('r.idrecinto','asc')
			->paginate(4);
			return view('sitios.recintos.index',["recintos"=>$recintos, "searchText"=>$query]);

		}

	}

	public function create()
    {
    	$parroquias=DB::table('parroquia')->get();
    	return view('sitios.recintos.create',['parroquias'=>$parroquias]);
    }

    public function store(RecintoFormRequest $request)
    {
    	$recinto = new Recinto;
    	$recinto->nombre=$request->get('nombre');
    	$recinto->totvotantes=$request->get('totvotantes');
    	$recinto->idparroquia=$request->get('idparroquia');
    	$recinto->save();
    	return Redirect::to('sitios/recintos');
    }

    public function show($id)
    {
    	return view("sitios.recintos.show",["recinto"=>Recinto::findOrFail($id)]);
    }


    public function edit($id)
    {
    		return view("sitios.recintos.edit",["recinto"=>Recinto::findOrFail($id)]);
    }

    public function update(RecintoFormRequest $request, $id)
    { 
    		$recinto = Recinto::findOrFail($id);
    		$recinto->nombre=$request->get('nombre');
    		$recinto->totvotantes=$request->get('totvotantes');
    		$recinto->idparroquia=$request->get('idparroquia');
    		$recinto->update();
    		return Redirect::to('sitios/recintos');
    }

     public function destroy($id)
    {
    		$recinto = Recinto::findOrFail($id);
    		$recinto->delete();
    		return Redirect::to('sitios/recintos');
    }
}
