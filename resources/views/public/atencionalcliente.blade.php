@extends('components.public.matrix')

@section('css_importados')

@stop


@section('content')



    <main>
        
        <section  class="bg-cover bg-center pt-16 xl:pt-5"  style="background-image:url({{asset('images/img/texturanosotros.png')}})">
            
            <section class="flex flex-col justify-start items-center px-[5%] xl:px-[8%] py-10 lg:py-16 gap-8 xl:gap-16 relative">
                
                <div class="flex flex-col gap-1 max-w-xl text-center mx-auto">
                    <h2 class="font-gotham_bold text-white text-3xl" data-aos="fade-down">
                        SELECCIONA LA OPCIÓN ASOCIADA
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 2xl:gap-10">
                    
                    <a href="{{route('atencionreclamo')}}"><div class="flex flex-col gap-4 p-6 2xl:p-10 rounded-2xl bg-white bg-opacity-10">
                        <div class="flex flex-row gap-4 justify-center items-center">
                            <img class="w-16 h-auto object-contain" src="{{asset('images/img/reclamo.png')}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                            <h2 class="font-gotham_bold text-white text-xl lg:text-2xl 2xl:text-3xl">Reclamo</h2>
                        </div>
                        <p class="font-gotham_book font-semibold text-white 2xl:text-xl">Registra tu reclamo sobre:</p>
                        <ul class="text-white font-gotham_book font-normal flex flex-col gap-3 list-disc list-outside pl-4">
                            <li class="text-base 2xl:text-xl">
                                La calidad y señal de los servicios de Internet o llamadas.
                            </li>

                            <li class="text-base 2xl:text-xl">
                               Inconformidad sobre la facturación
                            </li>

                            <li class="text-base 2xl:text-xl">
                                Otros inconvenientes relacionados con el servicio.
                            </li>
                        </ul>
                    </div></a>

                    <a href="{{route('atencionqueja')}}"><div class="flex flex-col gap-4 p-6 2xl:p-10 rounded-2xl bg-white bg-opacity-10">
                        <div class="flex flex-row gap-4 justify-center items-center">
                            <img class="w-11 h-auto object-contain" src="{{asset('images/img/queja.png')}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                            <h2 class="font-gotham_bold text-white text-xl lg:text-2xl 2xl:text-3xl">Queja</h2>
                        </div>
                        <ul class="text-white font-gotham_book font-normal flex flex-col gap-3 list-disc list-outside pl-4">
                            <li class="text-base 2xl:text-xl">
                                Registra tu queja si no has recibido respuesta a tu reclamo o has presentado inconvenientes con la tramitación del reclamo ya ingresado.
                            </li>
                        </ul>
                    </div></a>

                    <a href="{{route('atencionapelacion')}}"><div class="flex flex-col gap-4 p-6 2xl:p-10 rounded-2xl bg-white bg-opacity-10">
                        <div class="flex flex-row gap-4 justify-center items-center">
                            <img class="w-16 h-auto object-contain" src="{{asset('images/img/apelacion.png')}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                            <h2 class="font-gotham_bold text-white text-xl lg:text-2xl 2xl:text-3xl">Apelación</h2>
                        </div>
                        <ul class="text-white font-gotham_book font-normal flex flex-col gap-3 list-disc list-outside pl-4">
                            <li class="text-base 2xl:text-xl">
                                Si no te encuentras de acuerdo con la respuesta o solución a tu reclamo presentado anteriormente
                            </li>
                        </ul>
                    </div></a>
                </div>

            </section>
        
        </section>

    </main>



@section('scripts_importados')
@stop

@stop
