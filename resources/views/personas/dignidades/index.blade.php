@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Dignidades <a href="/personas/dignidades/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('personas.dignidades.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Lugar</th>
					
				</thead>
				@foreach ($dignidades as $dig)
				<tr>
					<td>{{$dig->iddignidad}}</td>
					<td>{{$dig->nombre}}</td>
					<td>{{$dig->lugar}}</td>
					<td>
						<a href="{{URL::action('DignidadController@edit',$dig->iddignidad)}}"><button class="btn btn-info" disabled="">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$dig->iddignidad}}" data-toggle="modal"><button class="btn btn-danger" disabled="">Eliminar</button></a>
					</td>
				</tr>
				@include('personas.dignidades.modal')
				@endforeach
			</table>
		</div>
		{{$dignidades->render()}}
	</div>
</div>

@endsection