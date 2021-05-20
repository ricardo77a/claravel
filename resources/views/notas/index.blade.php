@extends('layouts.admin')
@section('title', 'Listado de Notas')
@section('contenido')
	<div class="card-title"><strong>Listado de notas</strong></div>

	<div class="row">
		<div class="col s12">
			<a href="{{ route('notas.create') }}" class="btn green darken-4 waves-effect waves-light">Crear nueva Nota</a>
		</div>
	</div>
	<table class="responsive-table">
		<thead>
			<th>Id</th>
			<th>Nota</th>
			<th class="center-align">Imagen destacada</th>
			<th class="center-align">Estatus</th>
			<th class="center-align">Imagenes</th>
			<th colspan="3" class="center-align" width="30%">Acciones</th>
		</thead>
		<tbody>
			@forelse ($notas as $nota)
				<tr>
					<td>{{ $nota->id }}</td>
					<td>{{ $nota->titulo }}</td>
					<td class="center-align">
						<img src="{{ $nota->imagen }}" alt="Imagen destacada" class="responsive-img" style="max-height: 50px;">
					</td>
					<td class="center-align">
						<a href="{{ route('notas.estatus', $nota->id) }}" class="btn btn-small waves-effect waves-light col {{ ($nota->estatus == 1) ? 'green darken-4' : 'red darken-4' }}">
							{{ $nota->status }}
						</a>
					</td>
					<td width="10%">
						<a href="{{ route('notas.imagenes', $nota->id) }}" class="btn btn-small waves-effect waves-light col light-dark lighten-2">
							Imágenes
						</a>
					</td>
					<td width="10%">
						<a href="{{ route('notas.show', $nota->id) }}" class="btn btn-small waves-effect waves-light col light-blue lighten-2">
							<i class="small material-icons">remove_red_eye</i>
						</a>
					</td>
					<td width="10%">
						<a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-small waves-effect waves-light col amber darken-1">
							<i class="small material-icons">edit</i>
						</a>
					</td>
					<td width="10%">
						<form action="{{ route('notas.destroy', $nota->id) }}" method="POST">
							@method('DELETE')
							@csrf
							<button class="btn btn-small waves-effect waves-light col red darken-4"><i class="small material-icons">delete</i></button>
						</form>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="5" class="center-align">No hay ninguna nota</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection
