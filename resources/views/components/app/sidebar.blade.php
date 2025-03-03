<div>
  <!-- Sidebar backdrop (mobile only) -->
  <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
    :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

  <!-- Sidebar -->
  <div id="sidebar"
    class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
    @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

    <!-- Sidebar header -->
    <div class="flex justify-between mb-10 pr-3 sm:px-2">
      <!-- Close button -->
      <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen"
        aria-controls="sidebar" :aria-expanded="sidebarOpen">
        <span class="sr-only">Close sidebar</span>
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
        </svg>
      </button>
      <!-- Logo -->
      <a class="block mt-8 " href="{{ route('dashboard') }}">
        <img src="{{ asset('images/img/logorexconect.svg') }}" alt="Rexconect" />
      </a>
    </div>

    <!-- Links -->
    <div class="space-y-8">
      <!-- Pages group Maestros -->
      <div>
        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
          <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
            aria-hidden="true">•••</span>
          <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Redconex - Backend</span>
        </h3>
        <ul class="mt-3">

          <!-- Messages -->
          <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['mensajes'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['mensajes'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('mensajes.index') }}">
              <div class="flex items-center justify-between">
                <div class="grow flex items-center">
                  <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                    <path
                      class="fill-current @if (in_array(Request::segment(2), ['mensajes'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                      d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z" />
                    <path
                      class="fill-current @if (in_array(Request::segment(2), ['mensajes'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                      d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z" />
                  </svg>
                  <span
                    class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Mensajes</span>
                </div>
                <!-- Badge -->
                <div class="flex flex-shrink-0 ml-2">
                  @if ($mensajes !== 0)
                    <span
                      class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">{{ $mensajes }}</span>
                  @endif
                </div>
              </div>
            </a>
          </li>

          <x-menu.item id="reclamo" href="{{ route('reclamo.index') }}" icon="fas fa-comment-dots">
            Reclamaciones
            @if ($reclamo !== 0)
              <x-slot name="tag">
                {{ $reclamo }}
              </x-slot>
            @endif
          </x-menu.item>
 
          <x-menu.item id="cotizaciones" href="{{ route('cotizaciones') }}" icon="fas fa-address-card">
            Cotizaciones
          </x-menu.item>
        

          
          <x-menu.item id="datosgenerales" href="{{ route('datosgenerales.edit', 1) }}"
            icon="fas fa-undo-alt">
            Datos Generales
          </x-menu.item>

          <x-menu.item id="politicas-de-devolucion" href="{{ route('politicas-de-devolucion.edit', 1) }}"
            icon="fas fa-undo-alt">
            Politicas de Privacidad
          </x-menu.item>

          <x-menu.item id="terminos-y-condiciones" href="{{ route('terminos-y-condiciones.edit', 1) }}"
            icon="fas fa-undo-alt">
            Terminos y Condiciones
          </x-menu.item>


          <x-menu.item id="homeview" href="{{ route('homeview.edit', 1) }}" icon="fas fa-address-card">
            Textos - Home
          </x-menu.item>

          <x-menu.item id="sobrenosotros" href="{{ route('nosotrosview.edit', 1) }}" icon="fas fa-address-card">
            Textos - Nosotros
          </x-menu.item>

          <x-menu.item id="contactoview" href="{{ route('contactoview.edit', 1) }}" icon="fas fa-address-card">
            Textos - Contacto
          </x-menu.item>

          {{-- <x-menu.item id="innovaciones" href="{{ route('innovacionesview.edit', 1) }}" icon="fas fa-address-card">
            Textos - Innovacion
          </x-menu.item> --}}

          {{-- <x-menu.item id="productos" href="{{ route('productosview.edit', 1) }}" icon="fas fa-address-card">
            Textos - Productos
          </x-menu.item> --}}

          <x-menu.item id="benefit" href="{{ route('strength.index') }}" icon="fas fa-address-card">
            Beneficios
          </x-menu.item>

          <x-menu.item id="slider" href="{{ route('slider.index') }}" icon="fas fa-address-card">
            Slider
          </x-menu.item>

          <x-menu.item id="liquidacion" href="{{ route('liquidacion.index') }}" icon="fas fa-address-card">
            Complementos
          </x-menu.item>

          <x-menu.item id="mismarcas" href="{{ route('mismarcas.index') }}" icon="fas fa-address-card">
            Cobertura
          </x-menu.item>

          <x-menu.item id="valores" href="{{ route('misclientes.index') }}" icon="fas fa-address-card">
            Valores
          </x-menu.item>

          <x-menu.item id="testimonios" href="{{ route('testimonios.index') }}" icon="fas fa-address-card">
            Testimonios
          </x-menu.item>

          <x-menu.item id="faqs" href="{{ route('faqs.index') }}" icon="fas fa-address-card">
            Preguntas Frecuentes
          </x-menu.item>

          <x-menu.item id="subscripciones" href="{{ route('subscripciones') }}" icon="fas fa-address-card">
            Subscripciones
          </x-menu.item>

         

          <x-menu.item id="blog" href="{{ route('blog.index') }}" icon="fas fa-address-card">
            Blog
          </x-menu.item>

            <!-- Subscripciones -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['subscripciones'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['subscripciones'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('subscripciones') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['subscripciones'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['subscripciones'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Subscripciones
                </span>
              </div>
            </a>
          </li> --}}


          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['pedidos'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['pedidos'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('orders') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['pedidos'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['pedidos'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pedidos</span>
              </div>
            </a>
          </li> --}}



          <!-- Sliders -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['slider'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['slider'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('slider.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['slider'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['slider'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sliders</span>
              </div>
            </a>
          </li> --}}


          <!-- Staff -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['staff'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['staff'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('staff.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['staff'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['staff'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Equipo</span>
              </div>
            </a>
          </li> --}}


          <!-- Catalogos -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['catalogos'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['catalogos'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('descargables.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['catalogos'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['catalogos'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Catalogos</span>
              </div>
            </a>
          </li> --}}


          <!-- Certificados -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['certificados'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['certificados'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('certificados.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['certificados'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['certificados'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Certificados</span>
              </div>
            </a>
          </li> --}}

          <!-- Blog -->

          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['blog'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['blog'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('blog.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['blog'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['blog'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Blog</span>
              </div>
            </a>
          </li> --}}

        </ul>
      </div>

      <x-menu.group title="Productos">
        <x-menu.item id="category" href="{{ route('categorias.index') }}" icon="fas fa-list-alt">Categorías</x-menu.item>
        {{-- <x-menu.item id="subcategory" href="{{ route('subcategorias.index') }}" icon="fas fa-list-alt">Subcategorías</x-menu.item> --}}
        {{-- <x-menu.item id="microcategory" href="{{ route('microcategorias.index') }}" icon="fas fa-list-alt">Microcategorías</x-menu.item> --}}
        <x-menu.item id="product" href="{{ route('products.index') }}" icon="fas fa-pager">Servicios</x-menu.item>
      </x-menu.group>

      <!-- PRODUCTOS -->
      {{-- <div>
        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
          <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
            aria-hidden="true">•••</span>
          <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">PRODUCTOS</span>
        </h3>
        <ul class="mt-3"> --}}


          <!-- Category -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['categorias'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['categorias'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('categorias.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['categorias'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['categorias'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Categoría</span>
              </div>
            </a>
          </li> --}}


          <!-- Subcategory -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['subcategorias'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['subcategorias'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('subcategorias.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['subcategorias'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['subcategorias'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Subcategoría</span>
              </div>
            </a>
          </li> --}}

          <!-- Microcategory -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['microcategorias'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['microcategorias'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('microcategorias.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['microcategorias'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['microcategorias'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Microcategoria</span>
              </div>
            </a>
          </li> --}}


          <!-- Colecciones -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['colecciones'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['colecciones'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('colecciones.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['colecciones'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['colecciones'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Colecciones</span>
              </div>
            </a>
          </li> --}}

          <!-- Productos -->
          {{-- <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['products'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['products'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('products.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['products'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['products'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Productos</span>
              </div>
            </a>
          </li> --}}

        {{-- </ul>
      </div> --}}


      <!-- Mantenedores -->
      {{-- <div>
        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
          <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
            aria-hidden="true">•••</span>
          <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Mantenedores</span>
        </h3>
        <ul class="mt-3">

          <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['attributes'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['attributes'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('attributes.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['attributes'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['attributes'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Atributos</span>
              </div>
            </a>
          </li>
          <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('valoresattributes.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['valoresattributes'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                  Valor de atributo</span>
              </div>
            </a>
          </li>

          <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['tags'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['tags'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('tags.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['tags'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['tags'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Etiquetas</span>
              </div>
            </a>
          </li>

          <li
            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(2), ['tags'])) {{ 'bg-slate-900' }} @endif">
            <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(2), ['tags'])) {{ 'hover:text-slate-200' }} @endif"
              href="{{ route('prices.index') }}">
              <div class="flex items-center">
                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['tags'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif"
                    d="M1 3h22v20H1z" />
                  <path
                    class="fill-current @if (in_array(Request::segment(2), ['tags'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif"
                    d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                </svg>
                <span
                  class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Costos
                  de Envio</span>
              </div>
            </a>
          </li>


        </ul>
      </div> --}}

      <!-- Generador de Landing -->
      {{-- <x-menu.group title="Generador de Landing">
        <x-menu.item id="templates" href="{{ route('templates.index') }}"
          icon="fas fa-window-maximize">Plantillas</x-menu.item>
        <x-menu.item id="landings" href="{{ route('landings.index') }}" icon="fas fa-pager">Landings</x-menu.item>
      </x-menu.group> --}}
    </div>

    <!-- Expand / collapse button -->
    <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
      <div class="px-3 py-2">
        <button @click="sidebarExpanded = !sidebarExpanded">
          <span class="sr-only">Expand / collapse sidebar</span>
          <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
            <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
            <path class="text-slate-600" d="M3 23H1V1h2z" />
          </svg>
        </button>
      </div>
    </div>

  </div>
</div>
