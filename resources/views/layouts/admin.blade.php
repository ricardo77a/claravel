<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	    <!-- icon -->
	    <link rel="icon" href="https://www.zacatecas.gob.mx/wp-content/uploads/2017/02/favicon_32-0.png" sizes="32x32">
	    <!-- Iconos Google -->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	    @yield('css')
		<title>@yield('title', 'Blog')</title>
	</head>
	<body>
		<header>
			@include('layouts.fragments.nav')
		</header>
		<main>
			<div class="container" >
			    <div class="card" style="min-height: 300px;">
			        <div class="card-content">
						@yield('contenido')
			        </div>
			    </div>
			</div>
		</main>
		<footer>
			@include('layouts.fragments.footer')
		</footer>
		@include('notificaciones.notificaciones')
		@yield('scripts')
	</body>
</html>