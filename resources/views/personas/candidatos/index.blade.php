@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Candidatos <a href="/personas/candidatos/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('personas.candidatos.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Candidato</th>
					<th>Dignidad</th>
					<th>Lugar</th>

				</thead>
				@foreach ($candidatos as $can)
				<tr>
					<td>{{$can->nombre}}</td>
					<td>{{$can->dignidad}}</td>
					<td>{{$can->lugar}}</td>
					<td>
						<a href="{{URL::action('CandidatoController@edit',$can->idcandidato)}}"><button class="btn btn-info" disabled>Ingresar Votos</button></a>
						<a href="" data-target="#modal-delete-{{$can->idcandidato}}" data-toggle="modal"><button class="btn btn-danger" disabled="">Eliminar</button></a>
					</td>
				</tr>
				@include('personas.candidatos.modal')
				@endforeach
			</table>
		</div>
		{{$candidatos->render()}}
	</div>
</div>

@endsection
