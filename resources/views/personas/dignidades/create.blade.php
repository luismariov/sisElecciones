@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Nueva Dignidad</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger"> 
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'/personas/dignidades','method'=>'POST', 'autocomplete'=>'off'))!!}
		{!!Form::token()!!}

			<div class="form-group">
				<label for="Nombre">Nombre</label>
				<select name="nombre" id="slt_dignidad" class="form-control">
					<option value="Prefecto">Prefecto</option>
					<option value="Viceprefecto">Viceprefecto</option>
					<option value="Alcalde">Alcalde</option>
					<option value="Concejal">Concejal</option>
					<option value="Presidente Junta Parroquial">Presidente Junta Parroquial</option>
				</select>

			</div>

			<div id="divprov" class="form-group">
				<label for="provincia">Provincia</label>
				<select name="lugar" class="form-control">
								@foreach ($provincias as $prov)
									<option value="{{$prov->nombre}}">{{$prov->nombre}}</option>
								@endforeach
				</select>
			</div>
			<div id="divcant" class="form-group">
				<label for="canton">Canton</label>
				<select name="lugar" class="form-control">
								@foreach ($cantones as $can)
									<option value="{{$can->nombre}}">{{$can->nombre}}</option>
								@endforeach
				</select>
			</div>
			<div id="divjunta" class="form-group">
				<label for="parroquia">Junta</label>
				<select name="lugar" class="form-control">
								@foreach ($juntas as $pa)
									<option value="{{$pa->nombre}}">{{$pa->nombre}}</option>
								@endforeach
				</select>
			</div>

			
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		{!!Form::close()!!}

		@push('scripts')
		<script >

			$(document).ready(function(){
				ocultar();
				setTimeout(refrescar,20000);
				$('#slt_dignidad').change(function(){
				nombre =$("#slt_dignidad option:selected").text();
				switch(nombre)
				{
					case 'Prefecto':
					$("#divprov").show();
					$("#divcant").hide();
					$("#divjunta").hide();
					break;

					case 'Viceprefecto':
					$("#divprov").show();
					$("#divcant").hide();
					$("#divjunta").hide();
					break;

					case 'Alcalde':
					$("#divprov").hide();
					$("#divcant").show();
					$("#divjunta").hide();
					break;

					case 'Concejal':
					$("#divprov").hide();
					$("#divcant").show();
					$("#divjunta").hide();
					break;

					case 'Presidente Junta Parroquial':
					$("#divprov").hide();
					$("#divcant").hide();
					$("#divjunta").show();
					break;

				/**	default:
					$("#divprov").hide();
					$("#divcant").hide();
					$("#divjunta").hide();
					*/


				}

				});

			});


		

		function ocultar()
		{
			$("#divprov").hide();
			$("#divcant").hide();
			$("#divjunta").hide();

		}


		function refrescar()
		{
			location.reload();
		}

		</script>
		@endpush


	</div>
</div>

@endsection
