<nav class="bg-green-800 py-6 relative ">
    <div class="container mx-auto flex px-8 xl:px-0">
        <div id="menu" class="hidden flex-grow  w-full justify-between items-center absolute top-40 left-0 bg-green-800 py-14 px-8 lg:flex lg:relative lg:top-0  lg:py-0 lg:px-0 sm:px-14">

            <div class="flex flex-col text-center lg:flex-row">
                @if(Auth::check())
                <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                    <a href="{{route('productos.create')}}" class="bverde">Crear producto</a>
                </div>
                <a href="{{route('logout')}}" class="bblanco mb-1 lg:mr-4 lg:mb-0" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                    Desconectar {{Auth::user()->name}}
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="post" style="display:none;">
                    @csrf
                </form>
                @else
                <a href="{{url('login')}}" class="bblanco mb-1 lg:mr-4 lg:mb-0 btn btn-default">Iniciar Sesion</a>
                <a href="{{url('register')}}" class="bverde">Regístrate</a>
                @endif

                @if(session('cart'))
                <?php
                $totalProductos = 0;
                foreach (session('cart') as $producto) {
                    $totalProductos += $producto['cantidad'];
                }
                ?>
                <div class="ml-4 flex flex-col items-center">
                    <p class="text-white font-bold">Cesta de la compra</p>
                    <p class="text-white">{{ $totalProductos }} productos ({{ app(\App\Http\Controllers\CarritoController::class)->precioTotal() }} €)</p>
                    <div class="flex flex-col mb-8 lg:flex-row lg:mb-0 mx-auto">
                        <a href="{{ route('productos.carrito') }}" class="bverde">Comprar</a>
                    </div>
                </div>
                @else
                <p class="text-white">Cesta de la compra</p>
                @endif
            </div>
        </div>
    </div>
</nav>
<script>
    function openMenu() {
        let menu = document.getElementById('menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }
</script>