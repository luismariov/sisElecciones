@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Candidato</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger"> 
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'/personas/candidatos','method'=>'POST', 'autocomplete'=>'off'))!!}
		{!!Form::token()!!}

			
			<div class="form-group">
				<label for="Nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre...">

			</div>
			<div id="divdig" class="form-group">
				<label for="dignidad">Dignidad</label>
				<select name="dignidad" class="form-control">
								@foreach ($dignidad as $dig)
									<option value="{{$dig->nombre}}">{{$dig->nombre}}</option>
								@endforeach
				</select>
			</div>
			<div id="divdig" class="form-group">
				<label for="dignidad">Lugar</label>
				<select name="iddignidad" class="form-control">
								@foreach ($dignidad as $dig)
									<option value="{{$dig->iddignidad}}">{{$dig->lugar}}</option>
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
