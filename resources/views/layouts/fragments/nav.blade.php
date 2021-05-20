<nav>
	<div class="nav-wrapper grey darken-4">
		<a href="#" class="brand-logo">LABSOL</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="{{ route('categorias.index') }}">Categorias</a></li>
			<li><a href="{{ route('etiquetas.index') }}">Etiquetas</a></li>
			<li><a href="{{ route('notas.index') }}">Notas</a></li>
			<li>
		        <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
		            Cerrar Sesión
		        </a>
		        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		          	@csrf
		        </form>
			</li>
		</ul>
	</div>
</nav>