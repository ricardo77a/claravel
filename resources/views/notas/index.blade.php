@extends('layouts.admin')
@section('title', 'Listado de Notas')
@section('contenido')
	<div class="card-title"><strong>Listado de notas</strong></div>

	<div class="row">
		<div class="col s12">
			<a href="{{ route('notas.create') }}" class="btn green darken-4 waves-effect waves-light">Crear nueva Nota</a>
		</div>
	</div>
	<table>
		<thead>
			<th>Id</th>
			<th>Nota</th>
			<th>Estatus</th>
			<th>Imagen destacada</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@forelse ($notas as $nota)
				<tr>
					<td>{{ $nota->id }}</td>
					<td>{{ $nota->titulo }}</td>
					<td>{{ $nota->estatus }}</td>
					<td>{{ $nota->imagen }}</td>
					<td width="30%">
						<div class="row">
							<div class="col">
								<a href="{{ route('notas.show', $nota->id) }}" class="btn waves-effect waves-light col light-blue lighten-2">Show</a>
							</div>
							<div class="col">
								<a href="{{ route('notas.edit', $nota->id) }}" class="btn waves-effect waves-light col amber darken-1">Edit</a>
							</div>
							<div class="col">
								<form action="{{ route('notas.destroy', $nota->id) }}" method="POST">
									@method('DELETE')
									@csrf
									<button class="btn waves-effect waves-light col red darken-4">Delete</button>
								</form>
							</div>
						</div>
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
