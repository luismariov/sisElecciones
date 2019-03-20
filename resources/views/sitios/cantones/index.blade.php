@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cantones <a href="/sitios/cantones/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('sitios.cantones.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Canton</th>
					<th>Provincia</th>
					
				</thead>
				@foreach ($cantones as $can)
				<tr>
					<td>{{$can->nombre}}</td>
					<td>{{$can->provnombre}}</td>
					<td>
						<a href="{{URL::action('CantonController@edit',$can->idcanton)}}"><button class="btn btn-info" disabled="">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$can->idcanton}}" data-toggle="modal"><button class="btn btn-danger" disabled="">Eliminar</button></a>
					</td>
				</tr>
				@include('sitios.cantones.modal')
				@endforeach
			</table>
		</div>
		{{$cantones->render()}}
	</div>
</div>

@endsection