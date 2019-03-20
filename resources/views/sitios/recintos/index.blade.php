@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Recintos <a href="/sitios/recintos/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('sitios.recintos.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Recinto</th>
					<th>Votantes</th>
					<th>Parroquia</th>
					<th>Tipo</th>
					
				</thead>
				@foreach ($recintos as $reci)
				<tr>
					<td>{{$reci->nombre}}</td>
					<td>{{$reci->totvotantes}}</td>
					<td>{{$reci->parronombre}}</td>
					<td>{{$reci->tipo}}</td>
					<td>
						<a href="{{URL::action('RecintoController@edit',$reci->idrecinto)}}"><button class="btn btn-info" disabled="">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$reci->idrecinto}}" data-toggle="modal"><button class="btn btn-danger" disabled="">Eliminar</button></a>
					</td>
				</tr>
				@include('sitios.recintos.modal')
				@endforeach
			</table>
		</div>
		{{$recintos->render()}}
	</div>
</div>

@endsection