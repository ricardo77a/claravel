@extends('layouts.admin')
@section('title', 'Crear nueva etiqueta')

@section('contenido')
	<div class="row">
		<div class="col s12">
			<a href="{{ route('notas.index') }}" class="btn green darken-4 waves-effect waves-light">Listado de notas</a>
		</div>
	</div>

	<div class="row">
		<form class="col s12" action="{{ route('notas.store') }}" method="POST" enctype="multipart/form-data" files="true">
			{{-- 'contenido', 'slug', 'user_id' --}}
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<input id="titulo" type="text" class="validate" name="titulo">
					<label for="titulo">´Título</label>
				</div>
				@error('titulo')
				<div class="col s12">
					<small class="red-text">{{ $message }}</small>
				</div>
				@enderror
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="extracto" type="text" class="validate" name="extracto">
					<label for="extracto">Extracto</label>
				</div>
				@error('extracto')
				<div class="col s12">
					<small class="red-text">{{ $message }}</small>
				</div>
				@enderror
			</div>
			<div class="row">
				<div class="col s3">
				 	<input type="text" class="datepicker" id="fecha" name="fecha">
				 	<label for="fecha" class="">Fecha</label>
				</div>
				<div class="col s3">
				  <div class="input-field col s12">
				    	<select name="categoria_id">
				      		<option value="" disabled selected>Selecciona una opción</option>
				    		@foreach ($categorias as $categoria)
				      			<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
				    		@endforeach
				    	</select>
				    	<label>Categorías</label>
				  	</div>
				</div>
				<div class="col s3">
					<div class="input-field col s12">
				    	<select multiple name="etiquetas[]">
				      		<option value="" disabled>Selecciona una opción</option>
				    		@foreach ($etiquetas as $etiqueta)
				      			<option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
				    		@endforeach
				    	</select>
				    	<label>Etiquetas</label>
				  	</div>
				</div>
				<div class="col s3">
					<div class="input-field col s12">
				    	<select name="estatus">
				      		<option value="" disabled>Selecciona una opción</option>
			      			<option value="0">Inactivo</option>
			      			<option value="1">Activo</option>
				    	</select>
				    	<label>Estatus</label>
				  	</div>
				</div>
			</div>

			<div class="row">
				<div class="col s12 input-field">
					<div class="file-field input-field">
						<div class="btn btn-small green darken-4">
							<span>Imagen</span>
							<input type="file" name="imagen_destacada">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
                <textarea id="editor" name="contenido"></textarea>
			</div>
			<div class="row">
				<div class="col s12">
  					<button class="btn green darken-3 waves-effect waves-light" type="submit">
  						Guardar
  					</button>
				</div>
			</div>
		</form>
	</div>
@endsection


@section('scripts')
	<script>
  		$(document).ready(function(){
    		$('select').formSelect();
  		});
		$(document).ready(function(){
			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				i18n:{
					months:[
					  'Enero',
					  'Febrero',
					  'Marzo',
					  'Abril',
					  'Mayo',
					  'Junio',
					  'Julio',
					  'Agosto',
					  'Septiembre',
					  'Octubre',
					  'Noviembre',
					  'Diciembre'
					],
					monthsShort:[
					  'Ene',
					  'Feb',
					  'Mar',
					  'Abr',
					  'May',
					  'Jun',
					  'Jul',
					  'Ago',
					  'Sep',
					  'Oct',
					  'Nov',
					  'Dic'
					]
				}
			});
		});
	</script>

	<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
            ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                    .then( editor => {
                            console.log( editor );
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
    </script>
@endsection
