<div class="container">
	<div class="nav-header">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
		<h1 id="fh5co-logo"><a href="#"><i class="icon-airplane"></i>Travel</a></h1>
		<!-- START #fh5co-menu-wrap -->
		<nav id="fh5co-menu-wrap" role="navigation">
			<ul class="sf-menu" id="fh5co-primary-menu">
				<li><a href="/">Alojamientos</a></li>
				<li>
					<a href="/actividades" class="fh5co-sub-ddown">Actividades</a>
				</li>
				<li><a href="/buscar/vuelos">Vuelos</a></li>
				<li>
					<a href="/autos">Autos</a>
					<ul class="fh5co-sub-menu">
						<li><a href="/autos">Arriendo</a></li>
						<li><a href="/traslados">Traslado</a></li>
					</ul>
				</li>
				<li><a href="/paquetes">Paquetes</a></li>
				@guest
					<li><a href="/register">Registro</a></li>
					<li><a href="/login">Iniciar sesión</a></li>
				@else
					<li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        	<a class="dropdown-item" href="/usuario/{{Auth::user()->id}}/edit">
                                {{ __('Añadir fondos') }}
                            </a>
                            <a class="dropdown-item" href="/reserva/{{Auth::user()->id}}">
                                {{ __('Reservas') }}
                            </a>
                            @if(Auth::user()->rol == "admin")
                            	<a class="dropdown-item" href="/hoteles/create">
                                	{{ __('Alojamientos') }}
                            	</a>
                            	<a class="dropdown-item" href="">
                                	{{ __('Vuelos') }}
                            	</a>
                            	<a class="dropdown-item" href="">
                                	{{ __('Compañia') }}
                            	</a>
                            	<a class="dropdown-item" href="">
                                	{{ __('Autos') }}
                            	</a>
                            	<a class="dropdown-item" href="">
                                	{{ __('Paquete') }}
                            	</a>
							@endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
				@endguest	
				<li><a href="/carrito/compras">Carrito</a></li>
			</ul>
		</nav>
	</div>
</div>