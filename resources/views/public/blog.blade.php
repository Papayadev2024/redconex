@extends('components.public.matrix', ['pagina'=>'blog'])
@section('titulo', 'Blog')
@section('css_importados')

@stop


@section('content')
    <main class="bg-cover bg-center pt-16 xl:pt-5"  style="background-image:url({{asset('images/img/texturanosotros.png')}})">

        <section class="flex flex-row justify-start items-center px-[5%] xl:px-[10%] pt-10 lg:pt-16 gap-6 relative">
            <div class="flex flex-col gap-1 max-w-xl text-left" data-aos="fade-down">
                <h3 class="font-gotham_bold text-white text-lg ">Descrubre lo nuevo en tecnología</h3>
                <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl">Nuestro <span class="text-[#E29720]">Blog</span> de articulos</h2>
            </div>
        </section>

        <section class="flex flex-col lg:flex-row px-[5%] xl:px-[10%] pt-10 gap-12 justify-center items-start lg:items-center">
            <div class="w-full lg:w-2/3 flex flex-col justify-center" data-aos="fade-down">
                @if (is_null($lastpost))
                @else  
                    <a href="{{ route('detalleBlog', $lastpost->id) }}">
                        <div class="flex flex-col w-full bg-white bg-opacity-10 overflow-hidden rounded-3xl text-left">
                            <div class="flex flex-row justify-center">
                            <img class="w-full h-52 lg:h-96 object-cover" src="{{ asset($lastpost->url_image . $lastpost->name_image) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
                            </div>
                            <div class="p-6 flex flex-col gap-3">
                                <h2 class="font-gotham_bold text-white text-2xl xl:text-[21px] line-clamp-3">{{ $lastpost->title }}</h2>
                                <div class="font-gotham_book text-white text-base text-justify line-clamp-3">{!!$lastpost->extract ?? $lastpost->description!!}</div>
                                <div class="flex flex-row w-full">
                                    <a href="{{ route('detalleBlog', $lastpost->id) }}" class="bg-[#E29720] px-4 py-3 rounded-full text-[#21149E] text-center font-gotham_bold w-full"><span>Leer más</span></a>
                                </div>
                            </div>
                        </div>
                    </a>      
                @endif
            </div>
            <div class="w-full lg:w-1/3  flex flex-col justify-center items-start gap-3" data-aos="fade-down">
                <h3 class="font-gotham_bold text-white text-lg ">Últimos post</h3>
                @foreach ($postsgeneral->take(3) as $postr)
                    <div class="flex flex-row w-full max-w-[390px] bg-white bg-opacity-10 rounded-3xl overflow-hidden mx-auto">
                        <a href="{{ route('detalleBlog', $postr->id) }}">
                            <div class="flex flex-col gap-3 justify-center items-start w-3/5 p-3 cursor-pointer">
                                <div class="flex flex-col justify-center items-start h-20">
                                    <h2 class="font-gotham_bold text-lg text-white line-clamp-3">
                                        {{ $postr->title }}
                                    </h2>
                                </div>
                                <div class="flex flex-row w-full ">
                                    <a href="{{ route('detalleBlog', $postr->id) }}" class="bg-[#E29720] px-7 py-2 rounded-full text-[#21149E] text-center font-gotham_bold w-auto"><span>Leer más</span></a>
                                </div>
                            </div>   
                            <div class="w-2/5">
                                <img class="h-full w-full object-cover" src="{{ asset($postr->url_image . $postr->name_image) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';" />  
                            </div>
                        </a>
                    </div> 
                @endforeach
            </div>
        </section> 

        <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16">
            <div class="px-[5%] md:px-[10%] flex flex-col gap-5 md:gap-10">
                
                <div class="flex flex-col gap-6 w-full ">
                    
                    <div class="flex flex-col gap-1 max-w-xl text-left">
                        <h3 class="font-gotham_bold text-white text-lg " data-aos="fade-down">Descrubre lo nuevo en tecnología</h3>
                        <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl" data-aos="fade-down">Últimas publicaciones</h2>
                    </div>

                    <div class="flex flex-wrap gap-3 justify-center" data-aos="fade-down">
                        <a href="{{ route('blog.all') }}">
                            <div class="{{ $filtro == 0 ? 'bg-[#E29720] text-[#110B79]' : 'bg-white bg-opacity-10 text-white' }} rounded-3xl px-6 py-1.5 text-lg font-gotham_bold">
                                Todos
                            </div>
                        </a>

                        @foreach ($categorias as $item)
                            <a href="{{ route('blog', $item->id) }}" data-aos="fade-down">
                                <div class="rounded-3xl px-6 py-1.5 text-lg font-gotham_bold
                                     {{ $item->id == $filtro ? 'bg-[#E29720] text-[#110B79]' : 'bg-white bg-opacity-10 text-white' }} ">
                                    {{ $item->name }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                   
                </div>
                
                <div class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
                        @if (count($posts) > 0)
                            @foreach ($posts as $post)  
                                <div data-aos="fade-down" class="flex flex-col w-full bg-white bg-opacity-10 overflow-hidden rounded-3xl text-left">
                                    <a href="{{ route('detalleBlog', $post->id) }}">
                                        <div class="flex flex-row justify-center">
                                        <img class="w-full h-52 object-cover" src="{{ asset($post->url_image . $post->name_image) }}" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
                                        </div>
                                        <div class="p-6 flex flex-col gap-3">
                                            <h2 class="font-gotham_bold text-white text-2xl xl:text-[21px] line-clamp-3">{{ $post->title }}</h2>
                                            <div class="font-gotham_book text-white text-base text-justify line-clamp-3">{!!$post->extract ?? $post->description!!}</div>
                                            <div class="flex flex-row w-full">
                                                <a href="{{ route('detalleBlog', $post->id) }}" class="bg-[#E29720] px-4 py-3 rounded-full text-[#21149E] text-center font-gotham_bold w-full"><span>Leer más</span></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>   
                            @endforeach
                        @else 
                            <h3 class="font-gotham_bold col-span-3 text-white text-lg text-center">Sin publicaciones en esta categoria</h3>
                        @endif
                    </div>
                </div>
                
            </div>  
        </section>

        {{-- <section class="w-11/12 mx-auto pt-44 flex flex-col gap-10 pb-20">
            <div class="flex flex-col gap-2 w-full md:max-w-[768px]" data-aos="fade-up" data-aos-duration="150">
                <p class="uppercase text-[#FF5E14] font-roboto font-semibold text-text16">Blog</p>
                <h2 class="text-[#000929] font-bold font-roboto text-text40 md:text-text56 leading-tight">
                    En HPI te brindamos información útil y algunas recomendaciones
                </h2>
            </div>

            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-12">

                <div class="md:basis-1/6 flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                    <h3 class="text-[#082252] font-bold font-roboto text-text18">Blog categorias</h3>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('blog', 0) }}"
                            class="text-text18 py-3 px-4 rounded-lg font-semibold  {{ $filtro == 0 ? 'bg-[#FF5E14] text-white' : 'text-[#082252] bg-[#E6E4E5] bg-opacity-40 ' }} ">Todas</a>
                        @foreach ($categorias as $item)
                            <a href="{{ route('blog', $item->id) }}"
                                class="text-[#082252] font-normal text-text16 py-3 px-4 rounded-lg bg-[#E6E4E5] 
                                @if ($filtro == 0) @else {{ $item->id == $filtro ? 'bg-[#FF5E14] font-semibold text-white' : 'bg-[#E6E4E5] bg-opacity-40 text-[#082252] font-normal ' }} @endif">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="md:basis-5/6 flex flex-col gap-10">
                    @if (is_null($lastpost))
                    @else
                        <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                            <div class="flex justify-center items-center">
                                <img src="{{ asset($lastpost->url_image . $lastpost->name_image) }}" alt="blog"
                                    class="w-full h-[450px] object-cover rounded-xl hidden md:block">

                                <img src="{{ asset($lastpost->url_image . $lastpost->name_image) }}" alt="blog"
                                    class="w-full h-[450px] object-cover rounded-xl block md:hidden">
                            </div>
                            <div class="flex justify-start items-center gap-5">
                                <p
                                    class="text-white font-roboto font-semibold text-text14 bg-[#0C4AC3] py-2 px-4 rounded-lg">
                                    {{ $lastpost->categories->name }}</p>
                                <p class="text-[#0C4AC3] font-roboto font-semibold text-text14">Publicado
                                    {{ \Carbon\Carbon::parse($lastpost->created_at)->diffForHumans() }}</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h2 class="text-[#082252] font-roboto font-bold text-text32 leading-tight">
                                    {{ $lastpost->title }}</h2>
                                <p class="text-[#082252] text-text16 font-normal font-roboto">
                                    {{ Str::limit($lastpost->extract, 250) }}
                                </p>
                            </div>

                            <div>
                                <a href="{{ route('detalleBlog', $lastpost->id) }}"
                                    class="text-[#FF5E14] font-roboto font-normal text-text16 flex justify-start items-center gap-3">
                                    <span>Leer más</span>
                                    <div>
                                        <img src="{{ asset('images/svg/image_36.svg') }}" alt="arrow">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($posts->isEmpty())
                    @else
                        <div class="grid grid-cols-1 xl:grid-cols-2 gap-x-5 gap-y-10">
                            @foreach ($posts as $post)
                                <div class="flex flex-col gap-5" data-aos="fade-up" data-aos-duration="150">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset($post->url_image . $post->name_image) }}" alt="blog"
                                            class="w-full h-[300px] object-cover rounded-xl hidden md:block">
                                        <img src="{{ asset($post->url_image . $post->name_image) }}" alt="blog"
                                            class="w-full h-[220px] object-cover rounded-xl block md:hidden">
                                    </div>

                                    <div class="flex flex-col md:flex-row md:justify-start md:items-center gap-2 md:gap-5">
                                        <p
                                            class="text-white font-roboto font-semibold text-text14 bg-[#0C4AC3] py-2 px-4 rounded-lg text-center">
                                            {{ $post->categories->name }}</p>
                                        <p class="text-[#0C4AC3] font-roboto font-semibold text-text14">Publicado
                                            {{ \Carbon\Carbon::parse($lastpost->created_at)->diffForHumans() }}</p>
                                    </div>

                                    <div class="flex flex-col gap-1">
                                        <h2 class="text-[#082252] font-roboto font-bold text-text32 leading-tight">
                                            {{ $post->title }}</h2>
                                        <p class="text-[#082252] text-text16 font-normal font-roboto">
                                            {{ Str::limit($post->extract, 250) }}
                                        </p>
                                    </div>

                                    <div>
                                        <a href="{{ route('detalleBlog', $post->id) }}"
                                            class="text-[#FF5E14] font-roboto font-normal text-text16 flex justify-start items-center gap-3">
                                            <span>Leer más</span>
                                            <div>
                                                <img src="{{ asset('images/svg/image_36.svg') }}" alt="arrow">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif


                </div>

            </div>
        </section> --}}

        {{-- <section class="pb-20">
            <div class="relative w-11/12 mx-auto ">
                <img src="{{ asset('images/img/image_68.png') }}" alt="fondo"
                    class="w-full h-[270px] object-cover rounded-xl hidden md:block">
                <img src="{{ asset('images/img/image_69.png') }}" alt="fondo"
                    class="w-full h-[485px] object-cover rounded-xl block md:hidden">
                <div class="absolute transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2 w-11/12 mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="flex flex-col gap-3 justify-center">
                            <h3 class="text-white font-roboto font-bold text-text40 leading-tight">Únete a Nuestra
                                Comunidad
                            </h3>
                            <p class="text-white font-roboto font-normal text-text18">
                                Mantente al día con las últimas noticias, consejos y tendencias sobre tratamiento de agua.
                                ¡Inscríbete ahora y no te pierdas ninguna actualización!
                            </p>
                        </div>

                        <div class="flex flex-col gap-2 justify-center">

                            <form   id="footerBlog_Catalogo"
                                class="flex flex-col md:flex-row md:justify-start md:items-center gap-5">
                                @csrf
                                <div class="w-full">
                                    <input type="email"
                                        required name="email" id="emailFooter2"
                                        class="bg-white px-5 py-3 rounded-xl w-full placeholder:text-opacity-40 text-[#082252] transition-all focus:border-transparent border-0 focus:font-semibold"
                                        placeholder="Introduce tu correo electrónico" />
                                    <input type="hidden" id="nameFooter" required name="full_name" value="Usuario suscrito" />
                                    <input type="hidden" id="tipo" placeholder="tipo" name="tipo_message" value="Inscripción" />
                                </div>

                                <div class="flex justify-center items-center w-full md:w-auto">
                                    <button type="submit"
                                        class="font-roboto font-normal text-text16 text-white py-3 px-6 rounded-xl w-full md:w-auto text-center bg-[#FF5E14]">
                                        Subscríbete
                                    </button>
                                </div>
                            </form>

                            <div
                                class="text-white font-roboto font-semibold text-text12 flex flex-wrap justify-start items-center gap-1">
                                <p>Al hacer clic en Registrarse, confirma que está de acuerdo con nuestra </p>
                                <a id="linkPoliticas" target="_blank" class="underline cursor-pointer">Política de privacidad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>


@section('scripts_importados')


@stop

@stop
