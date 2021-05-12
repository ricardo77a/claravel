@extends('layouts.admin')

@section('title', 'Categorias | index')


@section('contenido')

	<table>
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure iusto, perferendis obcaecati maxime doloremque quae tenetur autem eaque, nesciunt ipsa, debitis perspiciatis vitae, aut! Voluptatem illum eveniet quo commodi minima.</td>
				<td width="30%">
					<div class="row">
						<div class="col">
							<a href="" class="btn col">Show</a>
						</div>
						<div class="col">
							<a href="" class="btn col">Edit</a>
						</div>
						<div class="col">
							<a href="" class="btn col">Delete</a>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>

@endsection
