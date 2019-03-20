@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Parroquia</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger"> 
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'/sitios/parroquias','method'=>'POST', 'autocomplete'=>'off'))!!}
		{!!Form::token()!!}
			<div class="form-group">
				<label for="Nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre...">

			</div>
			<div class="form-group">
				<label for="Nombre">Tipo</label>
				<select name="tipo" class="form-control">
								
									<option value="urbana">Urbana</option>
									<option value="rural">Rural</option>
								
							</select>

			</div>
			<div class="form-group">
				<label for="Nombre">Canton</label>
				<select name="idcanton" class="form-control">
								@foreach ($cantones as $can)
									<option value="{{$can->idcanton}}">{{$can->nombre}}</option>
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