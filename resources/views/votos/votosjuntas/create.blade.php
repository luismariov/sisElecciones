@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
							<label for="dignidad" >Dignidad</label>
									@foreach($dignidad as $dig)
											@if($dig->iddignidad == $candidato->iddignidad)
														<h5> {{$dig->nombre}} </h5>
											@endif
									@endforeach
					</div>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
								<label for="lugar">Lugar</label>
								@foreach($dignidad as $dig)
										@if($dig->iddignidad == $candidato->iddignidad)
													<h5> {{$dig->lugar}} </h5>
										@endif
								@endforeach
						</div>
					</div>

					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="form-group">
									<label for="dignidad">Candidato</label>
										<h5> {{$candidato->nombre}} </h5>
							</div>
						</div>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>

<!-- el form despues de grabar tiene que redireccionar al index.
NOTA EL MÉTODO POST ES EL QUE ENVIA LA INFO AL CONTROLADOR
AHI ESTA VINCULADO EL METODO POST A LA FUNCION STORE DEL CONTROLLER  -->
{!!Form::open(array('url'=>'/votos/votosjuntas','method'=>'POST', 'autocomplete'=>'off'))!!}
{!!Form::token()!!}

<!-- CANDIDATO tengo idcandidato,nombre, iddignidad     -->
<!-- DIGNIDAD tengo iddignidad,nombre,lugar      -->

<input type="hidden" name="idcandidato" value="{{$candidato->idcandidato}}" >

@foreach($dignidad as $dig)
		@if($dig->iddignidad == $candidato->iddignidad)
					<input type="hidden" name="dignidad" value="{{$dig->nombre}}" >
		@endif
@endforeach


<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Provincia</label>
						<select name="provincia" class="form-control selectpicker" id="provincia" data-live-search="true">
							@foreach($provincia as $provincia)
							<option value="{{$provincia->nombre}}">{{$provincia->nombre}}</option>
							@endforeach
						</select>
					</div>
</div>



{!!Form::close()!!}


@endsection
