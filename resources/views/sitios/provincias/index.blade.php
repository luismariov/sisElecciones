@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Provincias <a href="/sitios/provincias/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('sitios.provincias.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					
				</thead>
				@foreach ($provincias as $prov)
				<tr>
					<td>{{$prov->idprovincia}}</td>
					<td>{{$prov->nombre}}</td>
					<td>
						<a href="{{URL::action('ProvinciaController@edit',$prov->idprovincia)}}"><button class="btn btn-info" >Editar</button></a>
						<a href="" data-target="#modal-delete-{{$prov->idprovincia}}" data-toggle="modal"><button class="btn btn-danger" disabled="">Eliminar</button></a>
					</td>
				</tr>
				@include('sitios.provincias.modal')
				@endforeach
			</table>
		</div>
		{{$provincias->render()}}
	</div>
</div>

@endsection