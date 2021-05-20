@extends('layouts.admin')

@section('title', 'etiquetas | index')


@section('contenido')

	<div class="row">
		<div class="col s12">
			<a href="{{ route('etiquetas.create') }}" class="btn green darken-4 waves-effect waves-light">Crear nueva etiqueta</a>
		</div>
	</div>

	<table>
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@forelse ($etiquetas as $etiqueta)
				<tr>
					<td>{{ $etiqueta->id }}</td>
					<td>{{ $etiqueta->nombre }}</td>
					<td width="30%">
						<div class="row">
							<div class="col">
								<a href="{{ route('etiquetas.show', $etiqueta->id) }}" class="btn waves-effect waves-light col light-blue lighten-2">
									<i class="small material-icons">remove_red_eye</i>
								</a>
							</div>
							<div class="col">
								<a href="{{ route('etiquetas.edit', $etiqueta->id) }}" class="btn waves-effect waves-light col amber darken-1">
									<i class="small material-icons">edit</i>
								</a>
							</div>
							<div class="col">
								<form action="{{ route('etiquetas.destroy', $etiqueta->id) }}" method="POST">
									@method('DELETE')
									@csrf
									<button class="btn waves-effect waves-light col red darken-4">
										<i class="small material-icons">delete</i>
									</button>
								</form>
							</div>
						</div>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="3" class="center-align">No hay ninguna categoría</td>
				</tr>
			@endforelse
		</tbody>
	</table>

@endsection
