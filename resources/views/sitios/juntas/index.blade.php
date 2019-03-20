@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Juntas <a href="/sitios/juntas/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('sitios.juntas.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Numero Junta</th>
					<th>Tipo</th>
					<th>Recinto</th>
					<th>Parroquia</th>
					
				</thead>
				@foreach ($juntas as $jts)
				<tr>
					<td>{{$jts->numero}}</td>
					<td>{{$jts->tipo}}</td>
					<td>{{$jts->nombrerecinto}}</td>
					<td>{{$jts->nombreparroquia}}</td>
					<td>
						<a href="{{URL::action('JuntaController@edit',$jts->idjunta)}}"><button class="btn btn-info" disabled="">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$jts->idjunta}}" data-toggle="modal"><button class="btn btn-danger" disabled="">Eliminar</button></a>
					</td>
				</tr>
				@include('sitios.juntas.modal')
				@endforeach
			</table>
		</div>
		{{$juntas->render()}}
	</div>
</div>

@endsection