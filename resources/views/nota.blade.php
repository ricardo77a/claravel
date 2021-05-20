
<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	    <link rel="icon" href="https://www.zacatecas.gob.mx/wp-content/uploads/2017/02/favicon_32-0.png" sizes="32x32">
	    <title>{{ $nota->titulo }}</title>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col s8">
					<div class="">
						<div class="card col s12">
							<div class="center-align col s12">
								<img src="{{ $nota->imagen }}" alt="{{ $nota->imagen_destacada }}" class="responsive-img">
							</div>
							<div class="card-content">
								<h3 class="center-align">{{ $nota->titulo }}</h3>
								<div class="">
									<p>{!! $nota->contenido !!}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col s4">
					@foreach ($notas as $nota)
						<div class="row">
							<div class="col s12">
								<div class="card">
									<div class="card-image">
										<img src="{{ $nota->imagen }}">
										<span class="card-title"><strong>{{ $nota->titulo }}</strong></span>
									</div>
									<div class="card-content">
										<p>{{ $nota->extracto }}</p>
									</div>
									<div class="card-action">
										<a href="{{ route('ver.nota', $nota->slug) }}">Ver más...</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>



		<!--JavaScript at end of body for optimized loading-->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	</body>
</html>