@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Junta</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger"> 
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'/sitios/juntas','method'=>'POST', 'autocomplete'=>'off'))!!}
		{!!Form::token()!!}
			<div class="form-group">
				<label for="numero">Numero Junta</label>
				<input type="text" name="numero" class="form-control" placeholder="Numero...">

			</div>
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<select name="tipo" class="form-control">
					<option value="mujeres">Mujeres</option>			
					<option value="hombres">Hombres</option>
				</select>

			</div>
			<div class="form-group">
				<label for="idrecinto">Recinto</label>
				<select name="idrecinto" class="form-control">
								@foreach ($recintos as $reci)
									<option value="{{$reci->idrecinto}}">{{$reci->nombre}}</option>
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