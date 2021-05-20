@extends('layouts.admin')
@section('title', 'Crear nueva etiqueta')

@section('contenido')
	<div class="row">
		<div class="col s12">
			<a href="{{ route('notas.index') }}" class="btn green darken-4 waves-effect waves-light">Listado de notas</a>
		</div>
	</div>

	<div class="row">
		<form action="{{ route('notas.cargar.imagenes', $nota->id) }}" class="dropzone" id="dropzone" method="post" enctype="multipart/form-data">
			@csrf
		</form>
	</div>
	<div class="row">
		<div class="col s12">
			<a href="{{ route('notas.index') }}" class="btn green darken-3 waves-effect waves-light">Regresar a Listado de Notas</a>
		</div>
	</div>
@endsection


@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/dropzone/dist/dropzone.css') }}">

@endsection
@section('scripts')
	<script src="{{ asset('plugins/dropzone/dist/dropzone.js') }}"></script>

	<script type="text/javascript">

	</script>

@endsection
