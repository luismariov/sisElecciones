@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Parroquias <a href="/sitios/parroquias/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('sitios.parroquias.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Parroquia</th>
					<th>Tipo</th>
					<th>Cantón</th>
					
				</thead>
				@foreach ($parroquias as $parr)
				<tr>
					<td>{{$parr->nombre}}</td>
					<td>{{$parr->tipo}}</td>
					<td>{{$parr->cantnombre}}</td>
					<td>
						<a href="{{URL::action('ParroquiaController@edit',$parr->idparroquia)}}"><button class="btn btn-info" disabled="">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$parr->idparroquia}}" data-toggle="modal"><button class="btn btn-danger" disabled="">Eliminar</button></a>
					</td>
				</tr>
				@include('sitios.parroquias.modal')
				@endforeach
			</table>
		</div>
		{{$parroquias->render()}}
	</div>
</div>

@endsection