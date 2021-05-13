@extends('layouts.admin')

@section('title', 'Categorias | index')


@section('contenido')

	<div class="row">
		<div class="col s12">
			<a href="{{ route('categorias.create') }}" class="btn green darken-4 waves-effect waves-light">Crear nueva categoría</a>
		</div>
	</div>

	<table>
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@forelse ($categorias as $categoria)
				<tr>
					<td>{{ $categoria->id }}</td>
					<td>{{ $categoria->nombre }}</td>
					<td width="30%">
						<div class="row">
							<div class="col">
								<a href="{{ route('categorias.show', $categoria->id) }}" class="btn waves-effect waves-light col light-blue lighten-2">Show</a>
							</div>
							<div class="col">
								<a href="{{ route('categorias.edit', $categoria->id) }}" class="btn waves-effect waves-light col amber darken-1">Edit</a>
							</div>
							<div class="col">
								<form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
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
					<td colspan="3" class="center-align">No hay ninguna categoría</td>
				</tr>
			@endforelse
		</tbody>
	</table>

@endsection
