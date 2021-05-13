@extends('layouts.admin')
@section('title', 'Editar Categoría')

@section('contenido')
	<div class="row">
		<div class="col s12">
			<a href="{{ route('categorias.index') }}" class="btn green darken-4 waves-effect waves-light">Listado de categorías</a>
		</div>
	</div>

	<div class="row">
		<form class="col s12" action="{{ route('categorias.update', $categoria->id) }}" method="POST">
			@method('PUT')
			@csrf
			<div class="row">
				<div class="input-field col s12">
					<input id="nombre" type="text" class="validate" name="nombre" value="{{ $categoria->nombre }}">
					<label for="nombre">Nombre</label>
				</div>
				@error('nombre')
				<div class="col s12">
					<small class="red-text">{{ $message }}</small>
				</div>
				@enderror
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