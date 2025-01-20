<style>
    #modalPoliticasDev #modalTerminosCondiciones {
        height: 70vh;
        /* Establece la altura del modal al 70% de la altura de la ventana gráfica */
        overflow-y: auto;
        /* Permite el desplazamiento vertical si el contenido excede la altura del modal */
    }
</style>
<footer class="bg-[#21149E]"  style="background-image: url('{{asset('images/img/footertextura.png')}}');">
    <div class="grid grid-cols-1 w-full px-[5%] lg:px-[10%] py-10 lg:py-16 gap-10 md:gap-5">
        <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-5 col-span-1" data-aos="fade-up" data-aos-offset="150">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/img/logofooter.svg') }}" alt="Redconex" class="w-48" />
            </a>
            <div class="flex flex-col gap-5">
                <p class="font-gotham_bold text-base uppercase text-white tracking-wider font-semibold">
                    Enlaces
                </p>
                <div class="flex flex-col gap-2 text-white font-gotham_light text-base">
                    <a href="{{route('index')}}">Inicio</a>
                    <a href="{{route('nosotros')}}">Nosotros</a>
                    <a href="{{route('index')}}#beneficios">Beneficios</a>
                    <a href="{{route('index')}}#planes">Planes de internet</a>
                    <a href="{{route('contacto')}}">Contacto</a>
                </div>
            </div>
        
            <div class="flex flex-col gap-5">
                <p class="font-gotham_bold text-base uppercase text-white tracking-wider font-semibold">
                    Aviso legal
                </p>
                <div class="flex flex-col gap-2 text-white font-gotham_light text-base">
                    <a class="cursor-pointer" id="linkPoliticas">Política de Privacidad</a>
                    <a class="cursor-pointer" id="linkTerminos">Términos y Condiciones</a>
                </div>
            </div>

            <div class="flex flex-col gap-5">
                <p class="font-gotham_bold text-base uppercase text-white tracking-wider font-semibold">
                   DATOS DE CONTACTO
                </p>
                <div class="flex flex-col gap-2 text-white font-gotham_light text-base">
                    <a>{{ $general[0]->address }}, {{ $general[0]->inside }},
                                        {{ $general[0]->district }} - {{ $general[0]->city }}</a>
                    <a>Correo Electrónico: <br> {{ $general[0]->email }}</a> 
                    <a>Teléfono: {{ $general[0]->office_phone }}</a>
                </div>
            </div>
            
         
        </div>
    </div>

    <div
        class="flex flex-col items-start gap-3 md:flex-row md:justify-between md:items-center w-full px-[5%] lg:px-[10%] py-5 bg-cover"
        style="background-image:url({{asset('images/img/footerbarra.png')}})">
        <a href="#" target="_blank" class="text-white font-gotham_medium  text-sm text-center">Copyright &copy; 2025 Redconex Soluciones.
            Reservados todos los derechos</a>
       
        <div class="flex justify-start items-center gap-5 mx-auto sm:mx-0">
            <div class="flex flex-row gap-5">
                @if ($general[0]->facebook)
                    <a href="{{ $general[0]->facebook }}" target="_blank"
                        class="flex justify-start items-center gap-2 text-white font-roboto font-normal">
                        <i class="fa-brands fa-facebook-f text-xl"></i>
                    </a>
                @endif
                @if ($general[0]->instagram)
                    <a href="{{ $general[0]->instagram }}" target="_blank"
                        class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                        <i class="fa-brands fa-instagram text-xl"></i>
                    </a>
                @endif
                @if ($general[0]->youtube)
                    <a href="{{ $general[0]->youtube }}" target="_blank"
                        class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                        <i class="fa-brands fa-youtube text-xl"></i>
                    </a>
                @endif
                @if ($general[0]->twitter)
                    <a href="{{ $general[0]->twitter }}" target="_blank"
                        class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                        <i class="fa-brands fa-twitter text-xl"></i>
                    </a>
                @endif
                @if ($general[0]->linkedin)
                    <a href="{{ $general[0]->linkedin }}" target="_blank"
                        class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                        <i class="fa-brands fa-linkedin text-xl"></i>
                    </a>
                @endif
                @if ($general[0]->tiktok)
                    <a href="{{ $general[0]->tiktok }}" target="_blank"
                        class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                        <i class="fa-brands fa-tiktok text-xl"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div id="modalTerminosCondiciones" class="modal" style="max-width: 900px !important;width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 ">
            <h1 class="font-gotham_bold text-2xl text-center">Terminos y condiciones</h1>
            <p class="font-gotham_book p-2 prose">{!! $termsAndCondicitions->content ?? '' !!}</p>
        </div>
    </div>

    <div id="modalPoliticasDev" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <!-- Modal body -->
        <div class="p-4 ">
            <h1 class="font-gotham_bold text-2xl text-center">Politicas de privacidad</h1>
            <p class="font-gotham_book p-2 prose">{!! $politicDev->content ?? '' !!}</p>
        </div>
    </div>

</footer>

<script>
    $(document).ready(function() {
        $(document).on('click', '#linkTerminos', function() {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,
            })
        });

        $(document).on('click', '#linkPoliticas', function() {
            $('#modalPoliticasDev').modal({
                show: true,
                fadeDuration: 400,
            })
        });
    });
</script>
