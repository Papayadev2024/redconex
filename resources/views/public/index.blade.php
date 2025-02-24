@extends('components.public.matrix', ['pagina' => 'index'])
@section('titulo', 'Inicio')
@section('css_importados')

    <style>
        .swiper-pagination_productos>.swiper-pagination-bullet-active {
            background-color: transparent;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 20px;
            height: 20px;
            opacity: 1;
            background-image: url({{ asset('images/svg/image_29.svg') }});
        }

        .swiper-pagination_productos .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: transparent;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 20px;
            height: 20px;
            opacity: 1;
            background-image: url({{ asset('images/svg/image_30.svg') }});
        }

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

        .slider-pagination {
           
            margin-bottom: 30px;
        }
        
        /* Estilo de los puntos de paginación */
        .slider-pagination .swiper-pagination-bullet {
            width: 16px; /* Ancho personalizado */
            height: 9px; /* Alto personalizado */
            border-radius: 6px; /* Bordes redondeados */
            background-color: #F07407 !important; /* Color base */
            transition: background-color 0.3s, transform 0.3s; /* Transiciones suaves */
        }
        
        /* Estilo de los puntos que no están activos */
        .slider-pagination .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: white !important; /* Color más tenue */
            opacity: 0.8; /* Opacidad constante */
        }

        #imagen-zona {
            transition: opacity 0.3s ease-in-out;
        }
        .blocker{
            z-index: 50!important;
        }

        .comment.hidden {
            opacity: 0;
            pointer-events: none;
        }
        .comment {
            opacity: 1;
            transition: opacity 0.3s ease-in-out;
        }
    </style>

@stop


@section('content')
    <main>
        

        @if (count($slider) > 0)
            <div class="swiper slider">
                <div class="swiper-wrapper">
                    @foreach ($slider as $slide)    
                        <div class="swiper-slide">
                            <section class="bg-center h-svh bg-cover flex flex-col justify-center relative" style="background-image: url({{asset($slide->url_image . $slide->name_image)}})">
                                
                                    <img class="opacity-40 object-cover absolute top-0 h-full w-full" src="{{asset('images/img/texturaconex.png')}}" />
                                    <div class="flex flex-col lg:flex-row px-[5%]  py-[5%]  lg:px-[10%] pt-20 gap-5 justify-center items-start lg:items-end">
                                        <div class="z-20 w-full md:w-full xl:w-2/3 2xl:w-1/2 flex flex-col gap-4 2xl:gap-10 justify-center">
                                            
                                            <div class="flex flex-col gap-1">
                                                    <h3 class="font-gotham_bold text-white text-xl line-clamp-1">{{$slide->title}}</h3>
                                                    <h2 class="font-gotham_bold text-white text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-7xl line-clamp-3">{{$slide->description}}</h2>
                                            </div>

                                            @if ($slide->link1)
                                                <div class="flex flex-col justify-center items-start font-gotham_bold group">
                                                    
                                                    <a href="{{$slide->link1}}" class=" ">
                                                        <div class="bg-[#E29720] px-5 py-3 rounded-full tracking-normal ">
                                                            <p class="leading-none text-[#21149E] text-base 2xl:text-xl">{{$slide->botontext1 ?? "Ingrese texto"}}</p>
                                                        </div>
                                                    </a>

                                                </div> 
                                            @endif
                                           

                                            <div class="grid grid-cols-2 md:grid-cols-3 font-gotham_bold  gap-3 lg:gap-5 max-w-2xl">
                                                <div class="flex flex-col justify-center">
                                                    <span class="text-[#1EA7A2] text-3xl xl:text-5xl">{{$textoshome->subtitle1section ?? "Ingrese texto"}}</span>
                                                    <h2 class="text-white text-sm sm:text-base xl:text-lg">{{$textoshome->title1section ?? "Ingrese texto"}}</h2>
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <span class="text-[#1EA7A2] text-3xl xl:text-5xl">{{$textoshome->subtitle2section ?? "Ingrese texto"}}</span>
                                                    <h2 class="text-white text-sm sm:text-base xl:text-lg">{{$textoshome->title2section ?? "Ingrese texto"}}</h2>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="z-20 w-full lg:w-1/3 2xl:w-1/2 flex flex-col justify-end items-start lg:items-end">
                                          @if (!empty($textoshome->subtitle3section) && !empty($textoshome->cellphone3section) && !empty($textoshome->title3section))
                                            <div class="flex flex-col items-start justify-center  gap-1 z-10 text-left md:text-right bg-black bg-opacity-50 p-5 rounded-2xl w-full sm:w-auto" data-aos="zoom-in-up">
                                                <p class="text-white text-base font-gotham_bold w-full leading-tight">
                                                    {{$textoshome->subtitle3section}}
                                                </p>

                                                <p class="text-[#F07407] text-3xl xl:text-4xl font-gotham_bold w-full">
                                                    {{$textoshome->cellphone3section}}
                                                </p>

                                                <p class="text-white text-base font-gotham_bold w-full leading-tight">
                                                    {{$textoshome->title3section}}
                                                </p>
                                            </div>
                                          @endif  
                                        </div>
                                    </div> 
                                    <div class="absolute top-10 right-[8%] lg:flex hidden group">
                                        <div class="flex flex-col justify-center items-start font-gotham_bold   ">
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $general[0]->whatsapp }}&text={{ $general[0]->mensaje_whatsapp }}">
                                                <div class="bg-[#E29720] px-5 py-3 rounded-full tracking-normal">
                                                    <p class="leading-none text-[#21149E] text-base 2xl:text-xl">Habla con nosotros</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                
                            </section>
                        </div>
                    @endforeach    
                </div>
            </div>
        @endif

 
        @if (count($complementos) > 0)    
            <section class="bg-cover bg-opacity-100 relative" 
            style="background-image: url('{{asset('images/img/textura2.png')}}');">
                <div class="px-[5%] md:pl-[8%] md:pr-0 py-5 flex flex-col  md:flex-row gap-5 md:gap-10">
                    
                    <div class="w-full sm:w-full md:w-1/3  xl:w-1/4 flex flex-col justify-center" data-aos="fade-down">
                        <h2 class="font-gotham_bold text-4xl text-white text-left">
                            {{$textoshome->title4section ?? "Ingrese texto"}}
                        </h2>
                    </div>

                    <div class="w-full sm:w-3/4 md:w-2/3 xl:w-3/4" data-aos="fade-down">
                        <div class="swiper ofertas w-full">
                            <div class="swiper-wrapper">   
                                @foreach ($complementos as $complemento)
                                <div class="swiper-slide">
                                        <div class="flex cursor-pointer flex-col md:flex-row gap-3 max-w-[390px] bg-[#21149E] p-6 rounded-3xl mx-auto">
                                            <img  class="w-24 h-32 object-contain mx-auto" src="{{asset($complemento->url_image . $complemento->name_image)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                                            <div class="flex flex-col gap-3 justify-center items-start">
                                                <h2 class="font-gotham_bold text-2xl text-white line-clamp-2">
                                                    {{$complemento->title}}
                                                </h2>
                                                <div class="flex flex-row w-full group">
                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $general[0]->whatsapp }}&text=Ya soy cliente y me interesa: *{{ $complemento->title }}* " class="  bg-[#E29720] px-7 py-2 rounded-full text-[#21149E] text-center font-gotham_bold w-full"><span>Pídelo aquí</span></a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>  
            </section>
        @endif
            
        @if (count($productos) > 0)    
            <section 
                x-data="{
                    selected: 0,
                    categories: {{ json_encode($category) }},
                    products: {{ json_encode($productos) }},
                    swiperInstance: null,
                    get filteredProducts() {
                        if (!this.categories.length) return [];
                        const selectedCategory = this.categories[this.selected] || {};
                        return this.products.filter(product => product.categoria_id === selectedCategory.id);
                    },
                    reloadSwiper() {
                        this.$nextTick(() => {
                            if (window.swiperplan) {
                                window.swiperplan.destroy(true, true); // Destruye la instancia existente
                            }
                            window.swiperplan = new Swiper('.planes', {
                                slidesPerView: 3,
                                spaceBetween: 20,
                                centeredSlides: false,
                                initialSlide: 0,
                                loop: false,
                                autoplay: {
                                    delay: 2500,
                                    disableOnInteraction: false,
                                },
                                scrollbar: {
                                    el: '.swiper-scrollbar',
                                    draggable: true,
                                },
                                breakpoints: {
                                    0: { slidesPerView: 1 },
                                    768: { slidesPerView: 2 },
                                    1024: { slidesPerView: 3},
                                    1500: { slidesPerView: 3},
                                },
                            });
                        });
                    }
    
                
                }" 
                x-init="reloadSwiper()"
                class="bg-cover bg-opacity-100 relative py-10 lg:py-16"  style="background-image: url('{{asset('images/img/textura3.svg')}}');"
                >
            
                <div class="px-[5%]  flex flex-col items-center justify-center gap-5">
                    <div class="flex flex-col gap-1 max-w-xl text-center" data-aos="fade-down">
                        <h3 class="font-gotham_bold text-white text-lg ">{{$textoshome->subtitle5section ?? "Ingrese texto"}}</h3>
                        <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl">{{$textoshome->title5section ?? "Ingrese texto"}} <span class="text-[#E29720]">{{$textoshome->title5section2 ?? "Ingrese texto"}}</span> {{$textoshome->title5section3 ?? "Ingrese texto"}}</h2>
                    </div>
                    
                    {{-- <div x-data="{ selected: 0 }" class="flex flex-row gap-3 justify-center items-start font-gotham_medium">
                            @foreach ($category as $index => $cat)
                                    <div 
                                        @click="selected = {{ $index }}" 
                                        :class="selected === {{ $index }} 
                                            ? 'bg-[#E29720] text-[#110B79]' 
                                            : 'bg-white bg-opacity-10 text-white'" 
                                        class="px-5 py-2.5 rounded-full tracking-normal cursor-pointer"
                                    >
                                        <p class="leading-none text-sm sm:text-base">{{ $cat->name }}</p>
                                    </div>
                            @endforeach
                    </div> --}}

                    <div id="planes" class="flex flex-row gap-3 justify-center items-start font-gotham_medium" data-aos="fade-down">
                        <template x-for="(cat, index) in categories" :key="index">
                                <div class="group">
                                    <div 
                                        @click="selected = index; reloadSwiper();" 
                                        :class="selected === index 
                                            ? 'bg-[#E29720] text-[#110B79]' 
                                            : 'bg-white bg-opacity-10 text-white'" 
                                        class="px-5 py-2.5 rounded-full tracking-normal cursor-pointer  " 
                                    >
                                        <p class="leading-none text-sm sm:text-base" x-text="cat.name"></p>
                                    </div>
                                </div>
                        </template>
                    </div>
                </div>

                <div class="px-[5%] md:px-[8%] py-5 flex md:flex-row gap-5 md:gap-10">
        
                    <div class="w-full">
                        {{-- <div class="swiper planes w-full">
                            <div class="swiper-wrapper">   
                            @foreach ($productos as $producto)    
                                    <div class="swiper-slide my-auto">
                                        <div class="flex flex-col gap-3 max-w-[390px] bg-white hover:bg-[#1EA7A2] bg-opacity-10 p-6 rounded-3xl mx-auto">
                                            
                                                <div class="flex flex-row w-full">
                                                    <a class="bg-[#E29720] px-4 py-2 rounded-xl text-[#21149E] text-center font-gotham_bold w-auto line-clamp-2"><span>{{$producto->producto}}</span></a>
                                                </div>
                                                
                                                <h2 class="font-gotham_bold text-white text-4xl line-clamp-2">{{$producto->extract}}</h2>

                                                <div class="flex flex-col w-full">
                                                    <span class="font-gotham_book font-semibold tracking-wide text-white text-base">Desde</span>
                                                    <h2 class="font-gotham_bold text-white text-3xl">S/ {{$producto->precio}} <span class="font-gotham_book tracking-wide text-white text-base">/mes</span></h2>
                                                </div>

                                                <img class="w-full h-44 object-contain mx-auto my-2" src="{{asset($producto->imagen)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />

                                                <div class="flex flex-col gap-3 justify-center items-start">
                                                    <div class="flex flex-row w-full">
                                                        <a id="linkmodalcotizar" data-id={{$producto->id}} class="btn-cotizar cursor-pointer bg-[#21149E] border border-[#21149E] px-7 py-2 rounded-full text-white text-center font-gotham_bold w-full"><span>Me interesa</span></a>
                                                    </div>
                                                    <div class="flex flex-row w-full">
                                                        <a id="linkmodaldetalleplan" data-id={{$producto->id}} class="btn-detalle cursor-pointer bg-transparent border border-white px-7 py-2 rounded-full text-white text-center font-gotham_bold w-full"><span>Saber más</span></a>
                                                    </div>
                                                    <span class="font-gotham_book text-xs text-white">Al seleccionar, acepta Términos y Condiciones.</span>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}

                        <div class="swiper planes w-full mt-6" data-aos="fade-down">
                            <div class="swiper-wrapper flex flex-row justify-center">   
                                <template x-for="producto in filteredProducts" :key="producto.id">
                                    <div class="swiper-slide">
                                        <div class=" max-w-[390px] bg-white hover:bg-[#1EA7A2] bg-opacity-10  mx-auto  rounded-3xl overflow-hidden">
                                        <div class="flex flex-col p-6 gap-3 relative"> 
                                            <div class="flex flex-row w-full">
                                                <a class="bg-[#E29720] px-4 py-2 rounded-xl text-[#21149E] text-center font-gotham_bold w-auto line-clamp-2 ">
                                                    <span x-text="producto.producto"></span>
                                                </a>
                                            </div>
            
                                            <h2 class="font-gotham_bold text-white text-4xl line-clamp-2" x-text="producto.extract"></h2>
            
                                            <div class="flex flex-col w-full">
                                                <span class="font-gotham_book font-semibold tracking-wide text-white text-base">Desde</span>
                                                <h2 class="font-gotham_bold text-white text-3xl">
                                                    S/ <span x-text="producto.precio"></span>
                                                    <span class="font-gotham_book tracking-wide text-white text-base">/mes</span>
                                                </h2>
                                            </div>
            
                                            <img class="w-full h-44 object-contain mx-auto my-2" 
                                                :src="'{{ asset('images/img/noimagen.jpg') }}'" 
                                                x-bind:src="producto.imagen ? '{{ asset('') }}' + producto.imagen : '{{ asset('images/img/noimagen.jpg') }}'" 
                                                alt="Imagen producto" 
                                            />

                                            <div class="absolute right-3 md:right-3 top-1/3 -translate-y-1/3 "
                                                x-show="producto.destacar === 1">
                                                <img class="w-24 h-24 md:w-28 md:h-28 rounded-full object-contain animate-spin_slow" 
                                                    src="{{ asset('images/img/destacado.png') }}" 
                                                    alt="Imagen producto" 
                                                />
                                            </div>

                                            <meta name="csrf-token" content="{{ csrf_token() }}">

                                            <div class="flex flex-col gap-3 justify-center items-start">
                                                <div class="flex flex-row w-full">
                                                    <a id="linkmodalcotizar" 
                                                    x-bind:data-id="producto.id"  
                                                    class="btn-cotizar cursor-pointer bg-[#21149E] border border-[#21149E] px-7 py-2 rounded-full text-white text-center font-gotham_bold w-full">
                                                    <span>Me interesa</span>
                                                    </a>
                                                </div>
                                                <div class="flex flex-row w-full">
                                                    <a id="linkmodaldetalleplan" 
                                                    x-bind:data-id="producto.id" 
                                                    class="btn-detalle cursor-pointer bg-transparent border border-white px-7 py-2 rounded-full text-white text-center font-gotham_bold w-full">
                                                    <span>Saber más</span>
                                                    </a>
                                                </div>
                                                <span class="font-gotham_book text-xs text-white">Al seleccionar, acepta Términos y Condiciones.</span>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        @endif

        @if (count($zonas) > 0)   
            <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16" style="background-image: url('{{asset('images/img/textura4.png')}}');">
                <div class="px-[5%] md:px-[8%]  flex flex-col  lg:flex-row gap-5 md:gap-10">
                    <div class="w-full sm:w-full lg:w-1/3  flex flex-col justify-center">
                        <div class="swiper lugares w-full mt-1 h-[350px]  md:h-[360px]">
                            <div class="swiper-wrapper "  data-aos="fade-down">
                                @foreach ($zonas as $zona)
                                    <div class="swiper-slide">
                                        <div 
                                            class="flex cursor-pointer flex-row gap-3 items-center max-w-xs mx-auto p-3 bg-white group hover:bg-[#E29720] bg-opacity-10 rounded-2xl"
                                            data-image="{{ asset($zona->url_image . $zona->name_image) }}"
                                        >
                                            <img class="w-20 h-20 rounded-xl object-cover" src="{{asset($zona->url_image . $zona->name_image)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                                            <h3 class="font-gotham_bold text-white text-lg group-hover:text-[#21149E]">{{$zona->title}}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="w-full sm:w-full lg:w-2/3 flex flex-col justify-center gap-5 md:gap-10">
                        <div class="flex flex-col gap-1 max-w-2xl text-center mx-auto" data-aos="fade-down">
                            <h3 class="font-gotham_bold text-white text-lg ">{{$textoshome->subtitle6section ?? "Ingrese texto"}}</h3>
                            <h2 class="font-gotham_bold text-white text-4xl xl:text-5xl">{{$textoshome->title6section ?? "Ingrese texto"}} <span class="text-[#E29720]">{{$textoshome->title6section2 ?? "Ingrese texto"}}</span>  {{$textoshome->title6section3 ?? "Ingrese texto"}}</h2>
                        </div> 
                        <div>
                            <img id="imagen-zona" data-aos="fade-down" class="rounded-2xl overflow-hidden h-52 md:h-96 w-full object-cover transition-opacity duration-300 opacity-100" src="{{asset($zona->url_image . $zona->name_image)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                        </div>
                    </div>
                </div>  
            </section>
        @endif


        @if (count($testimonie) > 0)
            <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16"  style="background-image: url('{{asset('images/img/textura5.png')}}');">
                <div class="px-[5%] md:px-[10%] flex flex-col  lg:flex-row gap-5 md:gap-10 lg:items-center">
                    
                    <div class="w-full sm:w-full lg:w-1/2  flex flex-col justify-center">
                        <div class="flex flex-col gap-3 max-w-2xl text-left mx-auto" data-aos="fade-down">
                            <h3 class="font-gotham_bold text-white text-lg ">{{$textoshome->subtitle7section ?? "Ingrese texto"}}</h3>
                            <h2 class="font-gotham_bold text-white text-4xl xl:text-5xl">{{$textoshome->title7section ?? "Ingrese texto"}}<span class="text-[#21149E]"> {{$textoshome->title7section2 ?? "Ingrese texto"}}</span> {{$textoshome->title7section3 ?? "Ingrese texto"}}</h2>
                            <p class="font-gotham_book text-white text-base ">{{$textoshome->description7section ?? "Ingrese texto"}}</p>
                        </div>   
                    </div>

                    <div class="w-full lg:w-1/2">
                        <div>
                            <div class="swiper testimonios h-[500px]" data-aos="fade-down">
                                <div class="swiper-wrapper ">   
                                    @foreach ($testimonie as $testimonio)
                                        <div class="swiper-slide">
                                            <div class="flex flex-col justify-center">
                                                <div class="relative max-w-md mx-auto  xl:ml-auto mt-6 lg:mt-12">
                                                    
                                                    @if ($testimonio->email)
                                                        
                                                        <div class="group w-72 h-[400px] rounded-3xl overflow-hidden relative video-container" controls>
                                                                <div class="absolute top-0 left-0 size-full poster-container">
                                                                    <img class="w-full h-full object-cover size-full" src="{{ asset($testimonio->ocupation) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
                                                                </div>
                                                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 play-icon-container cursor-pointer group-hover:scale-110 transition-transform duration-300"><img src="{{ asset('images/img/iconoplay.png') }}"/></div>
                                                                {{-- <source src="https://www.youtube.com/embed/{{ $testimonio->url_video }}" type="video/mp4"> --}}
                                                                <iframe class="youtube-video w-full h-full hidden" width="100%" height="100%" src="https://www.youtube.com/embed/{{ $testimonio->email }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                
                                                        </div>
                                                        <div class="bg-[#21149E] p-4 rounded-2xl max-w-[300px] md:max-w-[370px] absolute -bottom-12 left-5 -right-14 md:-right-1/2">
                                                                {{-- <p class="font-gotham_book text-white text-base line-clamp-[7]">{{$testimonio->testimonie}}</p> --}}
                                                                <h3 class="font-gotham_bold text-white text-base text-right mt-1">{{$testimonio->name}}</h3>
                                                        </div>
                                                        
                                                    @else
                                                        <div>
                                                            <img class="rounded-3xl overflow-hidden h-[400px] w-72 object-cover " src="{{asset($testimonio->ocupation)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                                                            <div class="bg-[#21149E] p-4 rounded-2xl max-w-[300px] md:max-w-[370px] absolute -bottom-12 left-5 -right-14 md:-right-1/2">
                                                                <p class="font-gotham_book text-white text-base line-clamp-[7]">{{$testimonio->testimonie}}</p>
                                                                <h3 class="font-gotham_bold text-white text-base text-right mt-1">{{$testimonio->name}}</h3>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>  
            </section>
        @endif

        <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16 flex flex-col gap-10" 
          style="background-image: url('{{asset('images/img/textura3.svg')}}');">
           
          <div class="px-[5%] flex flex-col items-center justify-center gap-5">
            <div class="flex flex-col gap-1 max-w-3xl text-center" data-aos="fade-down">
                <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl">{{$textoshome->title8section ?? "Ingrese texto"}} <span class="text-[#E29720]">{{$textoshome->title8section2 ?? "Ingrese texto"}}</span> {{$textoshome->title8section3 ?? "Ingrese texto"}}</h2>
            </div>  
          </div>

          <div class="px-[5%] md:px-[10%] grid grid-cols-1 lg:grid-cols-2 gap-5 md:gap-10">
            @foreach ($benefit as $benefi)   
                <div class="flex flex-col gap-5 w-full bg-black bg-opacity-10 p-6 rounded-3xl text-center" data-aos="fade-down">
                    <div class="flex flex-row justify-center">
                        <div class="bg-[#1EA7A2] p-0 rounded-full overflow-hidden">
                            <img class="object-contain w-20" src="{{asset($benefi->icono)}}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />
                        </div>
                    </div>
                    <h2 class="font-gotham_bold text-white text-3xl max-w-sm mx-auto  lg:line-clamp-2">{{$benefi->titulo}}</h2>
                    <p class="font-gotham_book text-white text-base  lg:line-clamp-3">{{$benefi->descripcion}}</p>
                    <div class="flex flex-row w-full">
                        <a href="#planes" class="bg-[#E29720] px-4 py-3 rounded-full text-[#21149E] text-center font-gotham_bold w-full"><span>Elegir un plan</span></a>
                    </div>
                </div>
            @endforeach    
          </div> 

            <div class="px-[5%] md:px-[10%]">
                <div class="bg-[#1EA7A2]  rounded-3xl overflow-hidden flex flex-col lg:flex-row lg:justify-between gap-0 md:gap-10" data-aos="zoom-in-up">
                    <div class="flex flex-col gap-3 w-full lg:w-1/2 p-6 2xl:p-8 lg:max-w-xl  order-2 lg:order-1">
                        <div class="flex flex-col gap-1 text-left">
                            <h3 class="font-gotham_bold text-white text-lg ">{{$textoshome->subtitle9section ?? "Ingrese texto"}}</h3>
                            <h2 class="font-gotham_bold text-white text-3xl leading-none">{{$textoshome->title9section ?? "Ingrese texto"}}</h2>
                        </div> 
                        <form id="footerBlog_Catalogo">
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

                    <div class="flex flex-row justify-end items-end w-full lg:w-1/2 order-1 lg:order-2">
                        <img class="w-full h-full object-right object-cover" src="{{asset('images/img/imagensus.png')}}" />
                    </div>
                </div>
            </div>
        </section>

        @if (count($faqs) > 0 || count($posts) > 0)
            <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16" 
                style="background-image: url('{{asset('images/img/textura6.png')}}');">
                <div class="px-[5%] md:px-[10%] flex flex-col gap-5 md:gap-10">
                    @if (count($posts) > 0)
                        <div class="flex flex-col justify-start gap-3 md:flex-row md:justify-between w-full md:items-center" data-aos="fade-down">
                            <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl">{{$textoshome->subtitle10section ?? "Ingrese texto"}} <br><span class="text-[#21149E]"> {{$textoshome->title10section ?? "Ingrese texto"}}</span></h2>
                            <div class="flex flex-row">
                                <a href="{{ route('blog.all') }}">
                                    <div class="bg-[#E29720] text-[#110B79] rounded-3xl px-6 py-2 text-lg font-gotham_bold">
                                        Ver más noticias
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="w-full">
                            <div class="swiper slider_blog h-max" data-aos="fade-down">
                                <div class="swiper-wrapper">
                                    @foreach ($posts as $post)
                                        <div class="swiper-slide">
                                            <a href="{{ route('detalleBlog', $post->id) }}">
                                                <div class="flex flex-col w-full bg-[#21149E] overflow-hidden rounded-3xl text-left">
                                                    <div class="flex flex-row justify-center">
                                                    <img class="w-full h-52 object-cover" src="{{ asset($post->url_image . $post->name_image) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
                                                    </div>
                                                    <div class="p-6 flex flex-col gap-3">
                                                        <h2 class="font-gotham_bold text-white text-2xl xl:text-[21px] line-clamp-3">{{$post->title}}</h2>
                                                        <div class="font-gotham_book text-white text-base text-justify line-clamp-3">{!!$post->extract ?? $post->description!!}</div>
                                                        <div class="flex flex-row w-full">
                                                            <a href="{{ route('detalleBlog', $post->id) }}" class="bg-[#E29720] px-4 py-3 rounded-full text-[#21149E] text-center font-gotham_bold w-full"><span>Leer más</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>   
                                        </div>
                                    @endforeach  
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (count($faqs) > 0)
                        <div class="flex flex-col items-center justify-center gap-5">
                            <div class="flex flex-col gap-1 max-w-3xl text-center" data-aos="fade-down">
                                <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl leading-none"> {{$textoshome->subtitle11section ?? "Ingrese texto"}} <span class="text-[#21149E]">{{$textoshome->title11section ?? "Ingrese texto"}}</span></h2>
                            </div> 
                            
                            <div class="grid w-full divide-y divide-neutral-200 bg-[#21149E] px-6 py-2 rounded-2xl" data-aos="fade-down">
                            @foreach ($faqs as $faq)
                                <div class="py-3">
                                    <details class="group">
                                    <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                        <span class="font-bold text-[20px] text-white font-gotham_bold">
                                            {{$faq->pregunta ?? "Ingrese la pregunta"}}</span>
                                        <span class="transition group-open:rotate-180 bg-[#E29720] rounded-full p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none">
                                                <path d="M17 10L11.9992 14.58L7 10" stroke="#21149E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p class="text-base mt-3 text-white font-gotham_book">
                                        {!! $faq->respuesta ?? "Ingrese la respuesta" !!}
                                    </p>
                                    </details>
                                </div>
                            @endforeach  
                            </div>
                        </div>
                    @endif    
                </div>  
            </section>
        @endif

    </main>

    @foreach ($productos as $producto)
        
        <!-- Modal Detalle -->
        <div id="modaldetalleplan-{{$producto->id}}" class="modal !bg-[#1EA7A2] !p-0 !z-50" style="display: none; max-width: 650px !important; width: 100% !important;">
            <div class="w-full flex flex-col md:flex-row rounded-xl overflow-hidden">
                <div class="w-full md:w-1/2 p-4 flex flex-col gap-1">
                    <div class="flex flex-row w-full">
                        <a class="bg-[#E29720] px-4 py-2 rounded-xl text-base text-[#21149E] text-center font-gotham_bold w-auto line-clamp-2">
                            {{$producto->producto}}
                        </a>
                    </div>

                    <h2 class="font-gotham_bold text-white text-2xl line-clamp-2">{{$producto->extract}}</h2>
        
                    <div class="flex flex-col w-full">
                        <span class="font-gotham_book font-semibold tracking-wide text-white text-sm">Desde</span>
                        <h2 class="font-gotham_bold text-white text-2xl">
                            S/ {{$producto->precio}}
                            <span class="font-gotham_book tracking-wide text-white text-base">/mes</span>
                        </h2>
                    </div>

                    <div class="font-gotham_book text-white text-sm line-clamp-5">{!!$producto->description!!}</div>
        
                    <img class="w-full h-36 object-contain mx-auto my-2" 
                        src="{{ asset($producto->imagen) }}" 
                        onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"
                        alt="{{$producto->producto}}" 
                    />
                    @php
                        $html  = $producto->especificacion;
                        preg_match_all('/<p>(.*?)<\/p>/', $html, $matches);
                        $texts = $matches[1];
                    @endphp
                    
                    @if (count($texts) > 0)    
                        <div class="bg-[#E29720] p-2 rounded-xl">
                            @foreach ($texts as $text)
                                
                                <div class="text-[#21149E] font-gotham_light font-semibold text-sm flex flex-row gap-1">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M14.6673 7.9987C14.6673 4.3168 11.6825 1.33203 8.00065 1.33203C4.31875 1.33203 1.33398 4.3168 1.33398 7.9987C1.33398 11.6806 4.31875 14.6654 8.00065 14.6654C11.6825 14.6654 14.6673 11.6806 14.6673 7.9987Z" stroke="#21149E"/>
                                            <path d="M5.33398 8.33333L7.00065 10L10.6673 6" stroke="#21149E" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <p>{!! $text !!}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="w-full md:w-1/2 ">
                    <div class="bg-cover bg-center min-h-[500px] h-full w-full" style="background-image: url('{{asset('images/img/popimg.png')}}');" onerror="this.onerror=null;this.src='{{ asset('images/img/popimg.png') }}';" ></div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Cotizar -->
    <div id="modalcotizar" class="modal !bg-[#1EA7A2] !px-[15px] !z-50" style="display: none; max-width: 500px !important; width: 100% !important;">
        <div class="p-4 !bg-[#1EA7A2] flex flex-col gap-3">
            <div class="flex flex-col">
                <h2 class="font-gotham_bold leading-none text-white text-2xl md:text-3xl" id="nombreplan">nombreplan</h2>  
                <span class="text-[#21149E] text-base font-gotham_bold" id="caracteristicas"> caracteristica </span>
            </div>

            <h3 class="font-gotham_book text-base  text-white text-left ">
                ¡Se parte de la experiencia Red Conex, déjanos tus datos y te llamamos pronto!
            </h3>

            <h2 class="font-gotham_bold leading-none text-white text-2xl md:text-3xl">¡Olvídate de lo común, disfruta el <span class="text-[#21149E]"> 100% de fibra óptica </span> real!</h2>
            
            <form id="modalformcotizar">
                @csrf
                <div class="flex flex-col gap-2 justify-center items-center">
                    
                    <div class="flex flex-col gap-2 w-full">
                        <div class="w-full flex flex-col gap-3">
                            <input type="text" name="phone" id="phone" required
                                class="text-[#21149E] placeholder:text-[#21149E] font-gotham_medium px-2 text-base rounded-xl py-2 ring-0 border-0 focus:ring-0 focus:border-0 border-transparent ring-transparent" 
                                placeholder="Número de teléfono"
                            />

                            <input type="text" name="number_document" id="number_document" required
                                class="text-[#21149E] placeholder:text-[#21149E]  font-gotham_medium  px-2 text-base rounded-xl py-2 ring-0 border-0 focus:ring-0 focus:border-0 border-transparent ring-transparent" 
                                placeholder="DNI/RUC/CEX"
                            />
                            <input type="hidden" id="name" name="name" value="" />
                            <input type="hidden" id="extract" name="extract" value="" />
                           
                            <button type="submit" class="text-white bg-[#21149E] w-full px-3 py-2 rounded-3xl font-gotham_medium text-base">
                                Descubre tu Plan Ideal
                            </button>
                        </div>
                        <p class="text-white text-sm font-latoregular w-full leading-tight text-left">
                            Al enviar mis datos, acepto los Términos y Condiciones.
                        </p>
                    </div>
                </div>
            </form>
           
        </div>
    </div>

    

@section('scripts_importados')

    <script>   
        $('#modalformcotizar').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarTelefono($('#phone').val())) {
                return;
            };

            Swal.fire({

                title: 'Procesando información',
                html: `Enviando...
                    <p class=" text-text12">Revise su correo de Span</p>
                            <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4 ">
                                <div role="status">
                                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    
                                </div>
                                
                            </div>

            `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

           
            $.ajax({
                url: '{{ route('cotizar') }}',
                method: 'POST',
                data: formDataArray,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').val() // Incluye el token CSRF
                },
                success: function(response) {
                
                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#modalformcotizar')[0].reset();
                },
                error: function(error) {
                    Swal.close();
                    const obj = error.responseJSON.message;
                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key];
                            Swal.fire({
                                title: error.message,
                                text: "Ha ocurrido un error",
                                icon: "warning",
                            });
                            flag = true; 
                        }
                    });
                }
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-cotizar', function () {
                const id = $(this).data('id');

                $.ajax({
                    url: '{{ route('obtenerdata') }}',
                    method: 'POST',
                    data: {
                        id: id, 
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
                    success: function(response) {
                        $('#nombreplan').text(response.producto.producto);
                        $('#caracteristicas').text(response.producto.extract);
                        $('#name').val(response.producto.producto);
                        $('#extract').val(response.producto.extract);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });


                $(`#modalcotizar`).modal({
                    show: true,
                    fadeDuration: 400,
                });
            });

            $(document).on('click', '.btn-detalle', function () {
                const id = $(this).data('id');
                $(`#modaldetalleplan-${id}`).modal({
                    show: true,
                    fadeDuration: 400,
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.swiper-slide .flex');
            const mainImage = document.getElementById('imagen-zona');

            items.forEach(item => {
                item.addEventListener('click', function () {
                    const newImageSrc = this.getAttribute('data-image');
                    
                    // Aplicar efecto fade-out
                    mainImage.style.opacity = 0;

                    // Cambiar la imagen después del fade-out
                    setTimeout(() => {
                        mainImage.src = newImageSrc;

                        // Aplicar efecto fade-in
                        mainImage.style.opacity = 1;
                    }, 300); // Coincide con la duración de la transición CSS
                });
            });
        });

        var swiper = new Swiper(".slider", {
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
            },
            pagination: {
                el: ".slider-pagination",
                clickable: true,
            },
        });



        var swiper = new Swiper(".ofertas", {
            slidesPerView: 2.2,
            spaceBetween: 10,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                   
                },
                768: {
                    slidesPerView: 1.2,

                  
                },
                850: {
                    slidesPerView: 1.3,

                  
                },
                920: {
                    slidesPerView: 1.4,

                  
                },
                1024: {
                    slidesPerView: 1.6,
                  
                },
                1280: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                  
                },
                1300: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                  
                },
                1500: {
                    slidesPerView: 2.4,
                    spaceBetween: 20,
                  
                },
                1600: {
                    slidesPerView: 2.9,
                    spaceBetween: 20,
                  
                },
            },
        });

        var swiperplan = new Swiper(".planes", {
            slidesPerView: 3,
            spaceBetween: 20,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                   
                },

                768: {
                    slidesPerView: 2,
                },

                1024: {
                    slidesPerView: 3,
                },

            },
        });


        var swiper = new Swiper(".lugares", {
            slidesPerView: 3,
            direction: 'vertical',
            spaceBetween: 10,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
            },
        });

        var swiper = new Swiper(".slider_blog", {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: false,
            initialSlide: 0,
            grabCursor: true,
            loop: true,
             autoplay: {
                delay: 2500, 
                disableOnInteraction: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                   
                },
                750: {
                    slidesPerView: 2,
                   
                },
                1250: {
                    slidesPerView: 3,
                   
                },
            },
            pagination: {
                el: ".swiper-pagination_productos",
                clickable: true,
            },
        });

        var swiper = new Swiper(".categorias", {
            slidesPerView: 4,
            spaceBetween: 15,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: true,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                   
                },
                768: {
                    slidesPerView: 2,
                  
                },
                1024: {
                    slidesPerView: 3,
                  
                },
                1224: {
                    slidesPerView: 4,
                  
                },
            },
        });


        var swiper = new Swiper(".slider_productos", {
            slidesPerView: 4,
            spaceBetween: 30,
            centeredSlides: false,
            initialSlide: 0,
            grabCursor: true,
            loop: true,
             autoplay: {
                delay: 2000, 
                disableOnInteraction: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                   
                },
                600: {
                    slidesPerView: 2,
                   
                },
                950: {
                    slidesPerView: 3,
                   
                },
                1200: {
                    slidesPerView: 3,
                   
                },
            },
            pagination: {
                el: ".swiper-pagination_productos",
                clickable: true,
            },
        });

        document.addEventListener('DOMContentLoaded', () => {
            // Selecciona todas las instancias de videos
            const videoContainers = document.querySelectorAll('.video-container');

            videoContainers.forEach(container => {
                const playIcon = container.querySelector('.play-icon-container');
                const poster = container.querySelector('.poster-container');
                const iframe = container.querySelector('.youtube-video');

                playIcon.addEventListener('click', () => {
                    // Oculta el ícono y el póster
                    playIcon.style.display = 'none';
                    poster.style.display = 'none';

                    // Muestra el video
                    iframe.classList.remove('hidden');

                    // Agrega autoplay al iframe
                    const src = iframe.getAttribute('src');
                    iframe.setAttribute('src', src + (src.includes('?') ? '&autoplay=1' : '?autoplay=1'));
                });
            });

            // Inicializar Swiper
            const swiper = new Swiper(".testimonios", {
                slidesPerView: 1,
                spaceBetween: 15,
                loop: true,
                centeredSlides: false,
                on: {
                    slideChange: function () {
                        pauseVideos();
                    },
                },
            });

            // Pausar los videos al cambiar de diapositiva
            function pauseVideos() {
                videoContainers.forEach(container => {
                    const playIcon = container.querySelector('.play-icon-container');
                    const poster = container.querySelector('.poster-container');
                    const iframe = container.querySelector('.youtube-video');

                    // Reiniciar iframe src para pausar video
                    const src = iframe.getAttribute('src');
                    iframe.setAttribute('src', src.replace(/&?autoplay=1/, ''));

                    // Restaurar ícono y póster
                    playIcon.style.display = 'flex';
                    poster.style.display = 'block';
                    iframe.classList.add('hidden');
                });
            }
        });

       
    </script>

    <script>
        // Obtener información del navegador y del sistema operativo
        const platform = navigator.platform;
        document.getElementById('sistema').value = platform;

        // Obtener la geolocalización del usuario (si se permite)
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('latitud').value = position.coords.latitude;
                document.getElementById('longitud').value = position.coords.longitude;
            });
        }

        // Obtener la página de referencia
        const referrer = document.referrer;
        document.getElementById('llegade').value = referrer;


        // Obtener la resolución de la pantalla
        const screenWidth = window.screen.width;
        const screenHeight = window.screen.height;
        document.getElementById('anchodispositivo').value = screenWidth;
        document.getElementById('largodispositivo').value = screenHeight;
    </script>

    <script>
        // Mostrar mensaje de éxito
        @if (session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        @endif

        // Mostrar mensaje de error
        @if (session('error'))
            Swal.fire({
                title: 'Error',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        @endif
    </script>
@stop

@stop
