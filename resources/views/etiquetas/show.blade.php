@extends('layouts.admin')
@section('title', 'Mostrar categoría')
@section('contenido')

	<div class="row">
		<div class="col s12">
			<a href="{{ route('categorias.index') }}" class="btn green darken-4 waves-effect waves-light">Listado de categorías</a>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<strong>Nombre de la categoría:</strong><p>{{ $categoria->nombre }}</p>
			<strong>Creado el:</strong><p>{{ $categoria->created_at }}</p>
			<strong>Actualizado en:</strong><p>{{ $categoria->updated_at }}</p>
		</div>
	</div>

@endsection