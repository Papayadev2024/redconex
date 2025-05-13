@extends('components.public.matrix', ['pagina'=>'nosotros'])
@section('titulo', 'Nosotros')
@section('css_importados')
    <style>
        .swiper-button-next {
            background-color: #FFD9C7;
            background-repeat: no-repeat;
            background-position: center;
            width: calc(var(--swiper-navigation-size) / 29 * 27) !important;
            height: 50px;
            border-radius: 50%;
            transition: background-color 0.3s ease-in;
            background-image: url({{ asset('images/svg/image_43.svg') }})
        }

        .swiper-button-next:hover {
            background-color: #FF5E14;
            opacity: 1;
        }

        .swiper-button-prev {
            background-color: #FFD9C7;
            background-repeat: no-repeat;
            background-position: center;
            width: calc(var(--swiper-navigation-size) / 29 * 27) !important;
            height: 50px;
            border-radius: 50%;
            transition: background-color 0.3s ease-in;
            background-image: url({{ asset('images/svg/image_44.svg') }})
        }

        .swiper-button-prev:hover {
            background-color: #FF5E14;
            opacity: 1;
        }
    </style>
@stop
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@section('content')
    <main class="bg-cover bg-center pt-16 xl:pt-5" style="background-image:url({{asset('images/img/texturanosotros.png')}})">

        <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16"  style="background-image:url({{asset('images/img/texturanosotros.png')}})">
            <div class="px-[5%] md:px-[10%]">
                <div class="flex flex-col lg:flex-row lg:items-center bg-[#1EA7A2] rounded-3xl">
                    <div x-data="{ expanded: false }" class="w-full sm:w-full lg:w-1/2  flex flex-col justify-center p-7 md:p-10">
                        <div class="flex flex-col gap-3 max-w-2xl text-left mx-auto" data-aos="fade-down">
                            <h3 class="font-gotham_bold text-white text-lg ">{{$textosnosotros->subtitle5section ?? ""}}</h3>
                            <h2 class="font-gotham_bold text-white text-4xl xl:text-5xl">{!! preg_replace('/\*(.*?)\*/', '<span class="text-[#21149E]">$1</span>', $textosnosotros->title5section) !!}</h2>
                            <div
                                x-ref="content"
                                :style="expanded ? '' : 'max-height: 13rem; overflow: hidden;'"
                                x-transition.duration.500ms
                                class="font-gotham_book text-white text-base flex flex-col gap-3 overflow-hidden transition-all ease-in-out">
                                {!!$textosnosotros->description5section ?? ""!!}
                            </div>
                            <div class="w-auto">
                                <a  @click="expanded = !expanded" class="bg-[#21149E] px-4 py-2.5 rounded-xl text-white font-gotham_book transition-all duration-300 ease-in-out">
                                    <span x-text="expanded ? 'Leer menos' : 'Leer más'"></span>
                                </a>
                            </div>
                        </div>   
                    </div>

                    <div class="w-full lg:w-1/2 flex flex-row justify-center items-end">
                        <img class="w-full h-full object-cover object-bottom" src="{{asset($textosnosotros->url_image5section)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/cables.png') }}';" />
                    </div>
                </div>
            </div>  
        </section>
       
        
        <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16 bg-[#110B79]">
            <div class="px-[5%] md:px-[10%]">
                <div class="flex flex-col  lg:flex-row gap-5 md:gap-10 lg:items-center p-7 md:p-10 2xl:p-14 bg-[#21149E] rounded-3xl">
                    <div class="w-full lg:w-1/2 flex flex-row justify-center">
                        <img class="w-full h-full object-cover max-w-md" src="{{asset($textosnosotros->url_image6section)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/nosotrosmision.png') }}';" />
                    </div>

                    <div class="w-full sm:w-full lg:w-1/2  flex flex-col justify-center">
                        <div class="flex flex-col gap-3 max-w-2xl text-left mx-auto" data-aos="fade-down">
                            <h2 class="font-gotham_bold text-white text-4xl ">{!! preg_replace('/\*(.*?)\*/', '<span class="text-[#E29720]">$1</span>', $textosnosotros->title6section) !!}</h2>
                            <div class="font-gotham_book text-white text-base">
                                {{ $textosnosotros->description6section ?? "" }}
                            </div>
                        </div>   
                    </div>
                </div>
            </div>  
        </section>

        <section class="bg-cover bg-opacity-100 relative pb-10 lg:pb-16 bg-[#110B79]">
            <div class="px-[5%] md:px-[10%]">
                <div class="flex flex-col  lg:flex-row lg:items-center bg-[#21149E] rounded-3xl overflow-hidden">
                    <div class="w-full sm:w-full lg:w-1/2  flex flex-col justify-center p-7 md:p-10">
                        <div class="flex flex-col gap-3 max-w-2xl text-left mx-auto" data-aos="fade-down">
                            <h2 class="font-gotham_bold text-white text-4xl ">{!! preg_replace('/\*(.*?)\*/', '<span class="text-[#E29720]">$1</span>', $textosnosotros->title7section) !!}</h2>
                            <p class="font-gotham_book text-white text-base ">{{ $textosnosotros->description7section ?? "" }}</p>
                        </div>   
                    </div>

                    <div class="w-full lg:w-1/2 flex flex-row justify-center">
                        <img class="w-full h-full object-cover min-h-96" src="{{asset($textosnosotros->url_image7section)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/nosotrosvision.png') }}';" />
                    </div>
                </div>
            </div>  
        </section>

        

        <section class="bg-cover bg-opacity-100 relative py-10 xl:py-16 flex flex-col gap-10" 
          style="background-image: url('{{asset('images/img/textura3.svg')}}');">
           
          <div class="px-[5%]  flex flex-col items-center justify-center gap-5">
            <div class="flex flex-col gap-1 max-w-3xl text-center" >
                <h3 class="font-gotham_bold text-white text-lg " data-aos="fade-down">{{$textosnosotros->subtitle4section ?? "Ingrese un texto"}}</h3>
                <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl leading-none" data-aos="fade-down">{{$textosnosotros->title4section ?? "Ingrese un texto"}}
                     <span class="text-[#E29720]" data-aos="fade-down">{{$textosnosotros->title4section2 ?? "Ingrese un texto"}}</span></h2>
                <p class="text-white text-base font-gotham_book" data-aos="fade-down"> 
                    {{$textosnosotros->description4section ?? "Ingrese un texto"}}
                </p>
            </div>
          </div>

          <div class="px-[5%] md:px-[8%] grid grid-cols-1 lg:grid-cols-3 gap-5">
            @foreach ($valores as $valor)    
                <div class="flex flex-col gap-5 w-full bg-black bg-opacity-10 p-6 rounded-3xl text-center" data-aos="zoom-in-up">
                    <div class="flex flex-row justify-center">
                        <div class="bg-[#E29720] p-3 rounded-full">
                            <img class="h-10 w-10 object-contain" src="{{ asset($valor->url_image . $valor->name_image) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';">
                        </div>
                    </div>
                    <h2 class="font-gotham_bold text-white text-3xl max-w-sm mx-auto ">{{$valor->title}}</h2>
                    <p class="font-gotham_book text-white text-base ">{{$valor->description}}</p>
                </div>
            @endforeach
           </div>  
        </section>

        <section class="bg-cover bg-opacity-100 relative pb-10 xl:pb-16"  style="background-image: url('{{asset('images/img/textura3.svg')}}');">
           
            <div class="px-[5%]  flex flex-col items-center justify-center gap-5">
                <div class="flex flex-col gap-1 max-w-3xl text-center">
                    <h3 data-aos="fade-down" class="font-gotham_bold text-white text-lg ">{{$textosnosotros->subtitle1section ?? "Ingrese un texto"}}</h3>
                    <h2 data-aos="fade-down" class="font-gotham_bold text-white text-4xl lg:text-5xl leading-none">{{$textosnosotros->title1section ?? "Ingrese un texto"}} <span class="text-[#E29720]">{{$textosnosotros->title1section2 ?? "Ingrese un texto"}}</span></h2>
                    <p data-aos="fade-down" class="text-white text-base font-gotham_book"> 
                        {{$textosnosotros->description1section ?? "Ingrese un texto"}}
                    </p>
                </div>
            </div>

            <div class="px-[5%] md:px-[8%] py-5 flex flex-col md:flex-row gap-5 md:gap-10 md:justify-center">
                <div class="flex flex-col md:flex-row gap-3 w-auto md:w-[420px] bg-[#1EA7A2] py-3 md:py-0 px-3 rounded-3xl">
                    <img class="w-auto h-40 object-contain mx-auto " src="{{asset($textosnosotros->url_image2section)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/nosotroscable.png') }}';" />
                    <div class="flex flex-col gap-3 justify-center items-start p-3">
                        <div class="flex flex-col gap-0">
                            <h2 class="font-gotham_bold text-4xl text-white line-clamp-1" data-aos="fade-down">
                                {{$textosnosotros->title2section ?? "Ingrese un texto"}}
                            </h2>
                            <span class="font-gotham_book text-lg text-white line-clamp-1 " data-aos="fade-down">
                                {{$textosnosotros->subtitle2section ?? "Ingrese un texto"}}
                            </span>
                        </div>
                        <div class="flex flex-row w-full">
                            <a target="_blank" href="{{$textosnosotros->link2section}}" class="bg-[#21149E] px-7 py-2 rounded-full text-white text-center font-gotham_bold w-full"><span>Pídelo aquí</span></a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-3 w-auto md:w-[420px] bg-[#1EA7A2] py-3 md:py-0 px-3 rounded-3xl">
                    <img class="w-auto h-40 object-contain mx-auto " src="{{asset($textosnosotros->url_image3section)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/nosotrosvaron.png') }}';" />
                    <div class="flex flex-col gap-3 justify-center items-start p-3">
                        <div class="flex flex-col gap-0">
                            <h2 class="font-gotham_bold text-4xl text-white line-clamp-1" data-aos="fade-down">
                                {{$textosnosotros->title3section ?? "Ingrese un texto"}}
                            </h2>
                            <span class="font-gotham_book text-lg text-white line-clamp-1" data-aos="fade-down">
                                {{$textosnosotros->subtitle3section ?? "Ingrese un texto"}}
                            </span>
                        </div>
                        <div class="flex flex-row w-full">
                            <a target="_blank" href="{{$textosnosotros->link3section}}" class="bg-[#21149E] px-7 py-2 rounded-full text-white text-center font-gotham_bold w-full"><span>Pídelo aquí</span></a>
                        </div>
                    </div>
                </div>
            </div>  
            
        </section>


        <section class="bg-cover bg-opacity-100 relative pb-10 lg:pb-16 flex flex-col gap-10" 
          style="background-image: url('{{asset('images/img/textura3.svg')}}');">
           
            <div class="px-[5%] md:px-[10%]" data-aos="zoom-in-up">
                <div class="bg-[#1EA7A2]  rounded-3xl overflow-hidden flex flex-col lg:flex-row lg:justify-between gap-0 md:gap-10">
                    <div class="flex flex-col gap-3 w-full lg:w-1/2 p-6 2xl:p-8 lg:max-w-xl  order-2 lg:order-1">
                        <div class="flex flex-col gap-1 text-left">
                            <h3 class="font-gotham_bold text-white text-lg " data-aos="zoom-in-up">¡Se parte de la experiencia Red Conex!</h3>
                            <h2 class="font-gotham_bold text-white text-3xl leading-none" data-aos="zoom-in-up">¡Déjanos tu correo y recibe la mejor info!</h2>
                        </div> 
                        <form id="footerBlog_Catalogo" data-aos="zoom-in-up">
                            @csrf
                            <div class="flex flex-col gap-2 justify-center items-center">
                    
                                <div class="flex flex-col gap-2 w-full">
                                    <div class=" py-3 rounded-xl overflow-hidden  w-full flex flex-col gap-3">
                                        <label class="font-gotham_bold text-base text-white">EMAIL</label>
                                        <input type="email" name="email" id="emailFooter2" required
                                            class="text-[#21149E]  font-gotham_bold text-base rounded-xl py-3 ring-0 border-0 focus:ring-0 focus:border-0 border-transparent ring-transparent" 
                                            placeholder="Introduce tu email"
                                        />
                                        <input type="hidden" id="nameFooter" name="full_name" value="Usuario suscrito" />
                                        
                                        <button type="submit" class="text-white bg-[#21149E] w-full px-3 py-3 rounded-3xl font-gotham_bold text-base">
                                            Regístrate
                                        </button>
                                    </div>
                                    <p class="text-white text-sm font-latoregular w-full leading-tight text-left">
                                        Al enviar mis datos, acepto los Términos y Condiciones.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex flex-row justify-end items-end w-full lg:w-1/2 order-1 lg:order-2" data-aos="zoom-in-up">
                        <img class="w-full h-full object-right object-cover" src="{{asset('images/img/imagensus.png')}}" />
                    </div>
                </div>
            </div>
        </section>


       {{-- <section>
            <div class="flex flex-col gap-10 w-full px-[5%] mx-auto py-10 lg:py-20">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 sm:gap-10">
                       
                            <div class="flex flex-col justify-center gap-5 rounded-xl">
                                <h2 class="leading-tight font-gotham_medium  text-4xl lg:text-5xl xl:text-6xl text-[#0181AA] ">
                                    {{$textosnosotros->title1section ?? "Ingrese un texto"}}</h2>
                                <div class="h-[3px] bg-[#0181AA] w-32 rounded-full -mt-2"> </div>   
                                <p class="text-[#02324A] font-gotham_book font-normal text-lg">
                                    {{$textosnosotros->description1section ?? "Ingrese un texto"}}
                                </p>
                               
                            </div>
                             
                            <div class="flex flex-col items-center justify-center">
                                <img class="h-[450px] md:h-[500px] object-contain lg:h-[650px] w-full"  src="{{asset('images/img/cadmonosotros.png')}}" />
                            </div>
                     
                    </div>
            </div>
       </section> --}}


        {{-- <section>
            <div class="flex flex-col gap-10 w-full px-[5%] mx-auto pb-10 lg:pb-20 ">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 sm:gap-10">
                            
                            <div class="flex flex-col items-start justify-center order-2 lg:order-1 gap-0 lg:gap-5">
                                <h2 class="leading-tight font-gotham_medium  text-4xl text-[#0181AA] ">
                                    {{$textosnosotros->title3section ?? "Ingrese un texto"}}</h2>    
                                <img class="h-[350px] md:h-[400px] object-contain object-left lg:h-[450px] w-full"  src="{{asset('images/img/oficinacadmo.png')}}" />
                            </div>
                     
                            <div class="flex flex-col justify-center gap-8 xl:gap-16 order-1 lg:order-2">
                                <div class="flex flex-col gap-3">
                                    <h2 class="leading-tight font-gotham_medium  text-4xl text-[#0181AA] ">
                                        {{$textosnosotros->title3secondsection ?? "Ingrese un texto"}}</h2>
                                    <div class="h-[3px] bg-[#0181AA] w-28 rounded-full -mt-4"> </div>   
                                    <p class="text-[#02324A] font-gotham_book font-normal text-lg">
                                        {{$textosnosotros->description3secondsection ?? "Ingrese un texto"}}
                                    </p>
                                </div>
                                <div class="flex flex-col gap-3">
                                    <h2 class="leading-tight font-gotham_medium  text-4xl text-[#0181AA] ">
                                        {{$textosnosotros->title4section ?? "Ingrese un texto"}}</h2>
                                    <div class="h-[3px] bg-[#0181AA] w-28 rounded-full -mt-4"> </div>   
                                    <p class="text-[#02324A] font-gotham_book font-normal text-lg">
                                        {{$textosnosotros->description4section ?? "Ingrese un texto"}}
                                    </p>
                                </div>
                            </div>
                             
                           
                    </div>
            </div>
        </section> --}}
    
       
        {{-- @if ($benefit->isEmpty())
        @else
            <section>
                <div class="flex flex-col gap-10 w-full px-[5%] mx-auto pt-20 pb-10 lg:pb-20 ">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        @foreach ($benefit as $beneficios)
                            <div class="flex flex-col gap-5 bg-[#F5F7F9] p-4 rounded-xl">
                                <div class="flex justify-start items-center">
                                    <img class="h-10 w-10 object-contain" src="{{ asset($beneficios->icono) }}"
                                        alt="{{ $beneficios->titulo }}">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h2 class="leading-none font-gotham_medium text-4xl text-[#0181AA] ">
                                        {{ $beneficios->titulo }}</h2>
                                    <p class="text-[#02324A] font-gotham_book font-normal text-lg">
                                        {{ $beneficios->descripcion }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif --}}
       
    
    </main>

@section('scripts_importados')

    <script>
        var swiper = new Swiper(".testimonios", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                }
            },

        });

         var swiper = new Swiper(".clientes", {
            slidesPerView: 6,
            spaceBetween: 30,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 3,
                    centeredSlides: false,
                },
                1024: {
                    slidesPerView: 6,
                    centeredSlides: false,
                },
            },
        });
    </script>
@stop

@stop
