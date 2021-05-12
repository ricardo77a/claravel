<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<title>@yield('title', 'Blog')</title>
	</head>
	<body>
		<header>
			@include('layouts.fragments.nav')
		</header>
		<main>
			<div class="container" style="margin-top: 1em;">
				@yield('contenido')
			</div>
		</main>
		<footer>
			@include('layouts.fragments.footer')
		</footer>
	</body>
</html>