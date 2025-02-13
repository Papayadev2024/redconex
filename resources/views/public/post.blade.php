@extends('components.public.matrix', ['pagina'=>'blog'])
@section('titulo', 'Post')
@section('meta_title', $meta_title)
@section('meta_description', $meta_description)
@section('meta_keywords', $meta_keywords)
@section('css_importados')

@stop


@section('content')
    
    <main class="bg-cover bg-center pt-16 xl:pt-5"  style="background-image:url({{asset('images/img/texturanosotros.png')}})">

            <section class="flex flex-row justify-start items-center px-[5%] xl:px-[10%] pt-10 lg:pt-16 gap-6 relative">
                <div class="flex flex-col gap-1 max-w-3xl text-center mx-auto">
                    <h3 class="font-gotham_book text-white text-lg ">Publicado {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F, Y') }}</h3>
                    <h2 class="font-gotham_bold text-white text-3xl md:text-4xl lg:text-5xl">{{$post->title}}</h2>
                </div>
            </section>
            
            
            <section class="flex flex-col gap-5 px-[5%] xl:px-[10%] py-10 lg:py-16">

                @if($post->url_image)
                    <div class="w-full" data-aos="fade-up" data-aos-offset="150">
                        <img src="{{asset($post->url_image . $post->name_image)}}" alt="catedral" class="w-full h-[500px] object-cover hidden md:block" />
                        <img src="{{asset($post->url_image . $post->name_image)}}" alt="catedral" class="w-full h-[250px] object-cover block md:hidden" />
                    </div>
                @endif
                
                <div class="flex flex-col gap-2 text-white font-gotham_book font-normal text-text18 py-4">
                    {!!$post->description!!}
                </div>
            
                @if($post->url_video)
                    <div class="w-full" data-aos="fade-up" data-aos-offset="150">
                        <iframe class="h-[250px] lg:h-[500px]" width="100%" src="https://www.youtube.com/embed/{{ $post->url_video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif

            </section>

            @if (count($postsrelacionados) > 0)    
                <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16"  style="background-image: url('{{asset('images/img/textura6.png')}}');">
                    <div class="px-[5%] md:px-[10%] flex flex-col gap-5 md:gap-10">
                        
                        <div class="flex  gap-3 flex-row w-full justify-start">
                            <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl">Otras publicaciones</span></h2>
                        </div>
                        
                        <div class="w-full">
                            <div class="swiper slider_blog h-max">
                                <div class="swiper-wrapper">

                                    @foreach ($postsrelacionados as $post)
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
                    </div>  
                </section>
            @endif
    </main>


@section('scripts_importados')
    
    <script>
        var swiper = new Swiper(".slider_blog", {
            slidesPerView: 3,
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
    </script>

@stop

@stop
