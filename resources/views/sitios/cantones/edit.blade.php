@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Canton: {{$canton->nombre}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger"> 
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($canton,['method'=>'PATCH','route'=>['sitios.cantones.update', $canton->idicanton]])!!}
		{!!Form::token()!!}
			<div class="form-group">
				<label for="Nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre...">

			</div>
			<div class="form-group">
				<label for="Nombre">Provincia</label>
				<select name="idprovincia" class="form-control">
								@foreach ($provincias as $prov)
									<option value="{{$prov->idprovincia}}">{{$prov->nombre}}</option>
								@endforeach
							</select>

			</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		{!!Form::close()!!}
	</div>
</div>

@endsection