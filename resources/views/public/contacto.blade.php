@extends('components.public.matrix', ['pagina' => 'contacto'])
@section('titulo', 'Contacto')
@section('css_importados')

@stop


@section('content')
<main class="bg-cover bg-center pt-16 xl:pt-5"  style="background-image:url({{asset('images/img/texturanosotros.png')}})">

  <section class="flex flex-row justify-start items-center px-[5%] xl:px-[10%] pt-10 lg:pt-16 gap-6 relative">
      <div class="flex flex-col gap-1 max-w-xl text-left">
        <h3 class="font-gotham_bold text-white text-lg " data-aos="fade-down">{{$textoscontacto->subtitle1section ?? "Ingrese texto"}}</h3>
        <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl" data-aos="fade-down">{{$textoscontacto->title1section ?? "Ingrese texto"}} <span class="text-[#E29720]">{{$textoscontacto->title1section2}}</span></h2>
      </div>
  </section>


  <section class="flex flex-col md:flex-row justify-center items-center px-[5%] xl:px-[10%] pt-5 pb-10 lg:pb-16 gap-6 md:gap-16 relative">

      <form id="formContactos" class="w-full md:w-1/2 flex flex-col gap-3 got" data-aos="fade-down">
                @csrf           

                <div class="flex flex-col gap-1">
                  <label class="text-white text-base font-gotham_book font-semibold w-full leading-tight">Nombre completo</label>
                  <input id="name" type="text" required name="full_name" placeholder="Nombre y apellido" class="placeholder:text-[#21149E] text-[#21149E] placeholder:text-opacity-50 bg-white font-gotham_book font-semibold rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"/>
                </div>
      
                <div class="flex flex-col gap-1">
                  <label class="text-white text-base font-gotham_book font-semibold w-full leading-tight">Email</label>
                  <input required name="email" id="emailContacto" type="email" placeholder="hola@mail.com" class="placeholder:text-[#21149E] text-[#21149E] placeholder:text-opacity-50 bg-white font-gotham_book font-semibold rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"/>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-white text-base font-gotham_book font-semibold w-full leading-tight">Telefono</label>
                    <input required name="phone" id="telefonoContacto" type="text" placeholder="+51 123456789" class="placeholder:text-[#21149E] text-[#21149E] placeholder:text-opacity-50 bg-white font-gotham_book font-semibold rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"/>
                  </div>
      
                <div class="flex flex-col gap-1">
                  <label class="text-white text-base font-gotham_book font-semibold w-full leading-tight">Mensaje</label>
                  <textarea name="message" id="mensaje" rows="3" type="text" placeholder="Escribe tu mensaje" class="placeholder:text-[#21149E] text-[#21149E] placeholder:text-opacity-50 bg-white font-gotham_book font-semibold rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"></textarea>
                </div>

                <input required name="source" id="telefonoContacto" type="hidden" value="Inicio" class="placeholder:text-[#21149E] text-[#21149E] placeholder:text-opacity-50 bg-white font-gotham_book font-semibold rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0"/>
      
                <div class="flex flex-col gap-1">  
                  <button type="submit" class="bg-[#E29720] flex flex-row items-center justify-center gap-2 text-[#21149E] font-latobold rounded-xl px-3 py-2.5 ring-0 focus:ring-0 border-0" >Enviar
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                      <path d="M18.8327 10.4141C18.8327 10.0046 18.8283 9.1784 18.8195 8.76773C18.7651 6.21311 18.7378 4.93581 17.7953 3.98961C16.8526 3.04342 15.5408 3.01046 12.917 2.94454C11.2999 2.90391 9.69877 2.90391 8.0817 2.94453C5.45796 3.01045 4.14608 3.04341 3.20347 3.98961C2.26087 4.9358 2.23363 6.2131 2.17915 8.76773C2.16163 9.58915 2.16164 10.4056 2.17916 11.2271C2.23363 13.7817 2.26087 15.059 3.20348 16.0052C4.14608 16.9514 5.45796 16.9843 8.08171 17.0502C8.75067 17.0671 9.41693 17.0769 10.0827 17.0798" stroke="#21149E" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M2.16602 5L7.92687 8.27052C10.0316 9.46542 10.9671 9.46542 13.0718 8.27052L18.8327 5" stroke="#21149E" stroke-width="1.25" stroke-linejoin="round"/>
                      <path d="M18.8327 14.5833H12.166M18.8327 14.5833C18.8327 13.9998 17.1708 12.9096 16.7493 12.5M18.8327 14.5833C18.8327 15.1668 17.1708 16.2571 16.7493 16.6667" stroke="#21149E" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </button>
                </div>
      
      </form>
      
      <div class="w-full md:w-1/2 max-w-lg ml-auto">
          <div class="flex flex-col justify-center items-start gap-4">
                  
                  
                  <h3 class="font-gotham_bold text-white text-2xl" data-aos="fade-down">{{$textoscontacto->title2section ?? "Ingrese texto"}}</h3>
                  <p class="font-gotham_book text-white text-base " data-aos="fade-down">{{$textoscontacto->description2section ?? "Ingrese texto"}}</p>

                  

                  <div class="flex flex-row gap-2 items-center justify-start" data-aos="fade-down">
                    <div class="flex flex-row">
                      <div class="bg-[#1EA7A2] p-1 rounded-full w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <path d="M1.66699 4.16797L7.42784 7.43849C9.53258 8.63339 10.4681 8.63339 12.5728 7.43849L18.3337 4.16797" stroke="#F2F4FF" stroke-width="1.25" stroke-linejoin="round"/>
                          <path d="M8.75033 16.2487C8.36174 16.2436 7.97268 16.2362 7.58268 16.2264C4.95893 16.1604 3.64706 16.1274 2.70446 15.1807C1.76185 14.2339 1.73461 12.9559 1.68013 10.3999C1.66262 9.57795 1.66261 8.76095 1.68013 7.93906C1.73461 5.38297 1.76184 4.10493 2.70445 3.15819C3.64706 2.21145 4.95893 2.17847 7.58268 2.11251C9.19974 2.07186 10.8009 2.07187 12.418 2.11252C15.0417 2.17848 16.3536 2.21146 17.2962 3.15821C18.2388 4.10494 18.2661 5.38298 18.3205 7.93907C18.3286 8.31746 18.3329 8.49578 18.3336 8.7487" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M15.833 14.168C15.833 14.8583 15.2733 15.418 14.583 15.418C13.8927 15.418 13.333 14.8583 13.333 14.168C13.333 13.4776 13.8927 12.918 14.583 12.918C15.2733 12.918 15.833 13.4776 15.833 14.168ZM15.833 14.168V14.5846C15.833 15.275 16.3927 15.8346 17.083 15.8346C17.7733 15.8346 18.333 15.275 18.333 14.5846V14.168C18.333 12.0969 16.6541 10.418 14.583 10.418C12.5119 10.418 10.833 12.0969 10.833 14.168C10.833 16.2391 12.5119 17.918 14.583 17.918" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </div>
                    </div>
                    <p class="text-white text-base font-gotham_book w-full leading-tight">
                        @foreach ($general as $item)
                            {{ $item->email ?? "Ingrese un email"}}
                        @endforeach
                    </p>
                  </div>
      
                  <div class="flex flex-row gap-2 items-center justify-start">
                    <div class="flex flex-row">
                      <div class="bg-[#1EA7A2] p-1 rounded-full w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <path d="M1.66699 4.16797L7.42784 7.43849C9.53258 8.63339 10.4681 8.63339 12.5728 7.43849L18.3337 4.16797" stroke="#F2F4FF" stroke-width="1.25" stroke-linejoin="round"/>
                          <path d="M8.75033 16.2487C8.36174 16.2436 7.97268 16.2362 7.58268 16.2264C4.95893 16.1604 3.64706 16.1274 2.70446 15.1807C1.76185 14.2339 1.73461 12.9559 1.68013 10.3999C1.66262 9.57795 1.66261 8.76095 1.68013 7.93906C1.73461 5.38297 1.76184 4.10493 2.70445 3.15819C3.64706 2.21145 4.95893 2.17847 7.58268 2.11251C9.19974 2.07186 10.8009 2.07187 12.418 2.11252C15.0417 2.17848 16.3536 2.21146 17.2962 3.15821C18.2388 4.10494 18.2661 5.38298 18.3205 7.93907C18.3286 8.31746 18.3329 8.49578 18.3336 8.7487" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M15.833 14.168C15.833 14.8583 15.2733 15.418 14.583 15.418C13.8927 15.418 13.333 14.8583 13.333 14.168C13.333 13.4776 13.8927 12.918 14.583 12.918C15.2733 12.918 15.833 13.4776 15.833 14.168ZM15.833 14.168V14.5846C15.833 15.275 16.3927 15.8346 17.083 15.8346C17.7733 15.8346 18.333 15.275 18.333 14.5846V14.168C18.333 12.0969 16.6541 10.418 14.583 10.418C12.5119 10.418 10.833 12.0969 10.833 14.168C10.833 16.2391 12.5119 17.918 14.583 17.918" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </div>
                    </div>
                    <p class="text-white group-hover:text-white text-base font-gotham_book w-full leading-tight">
                        @foreach ($general as $item)
                            @if ($item->cellphone && $item->office_phone)
                                {{ $item->cellphone ?? "Ingrese nro. celular" }} / {{ $item->office_phone ?? "Ingrese nro. telefónico" }}
                            @elseif($item->cellphone && empty($item->office_phone))
                                {{ $item->cellphone ?? "Ingrese nro. celular" }}
                            @elseif($item->office_phone && empty($item->cellphone))
                                {{ $item->office_phone ?? "Ingrese nro. telefónico" }}
                            @else
                                <p>No hay información disponible para este ítem.</p>
                            @endif
                        @endforeach
                    </p>
                  </div>
      
                  <div class="flex flex-row gap-2 items-center justify-start" data-aos="fade-down">
                    <div class="flex flex-row">
                      <div class="bg-[#1EA7A2] p-1 rounded-full w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <path d="M1.66699 4.16797L7.42784 7.43849C9.53258 8.63339 10.4681 8.63339 12.5728 7.43849L18.3337 4.16797" stroke="#F2F4FF" stroke-width="1.25" stroke-linejoin="round"/>
                          <path d="M8.75033 16.2487C8.36174 16.2436 7.97268 16.2362 7.58268 16.2264C4.95893 16.1604 3.64706 16.1274 2.70446 15.1807C1.76185 14.2339 1.73461 12.9559 1.68013 10.3999C1.66262 9.57795 1.66261 8.76095 1.68013 7.93906C1.73461 5.38297 1.76184 4.10493 2.70445 3.15819C3.64706 2.21145 4.95893 2.17847 7.58268 2.11251C9.19974 2.07186 10.8009 2.07187 12.418 2.11252C15.0417 2.17848 16.3536 2.21146 17.2962 3.15821C18.2388 4.10494 18.2661 5.38298 18.3205 7.93907C18.3286 8.31746 18.3329 8.49578 18.3336 8.7487" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M15.833 14.168C15.833 14.8583 15.2733 15.418 14.583 15.418C13.8927 15.418 13.333 14.8583 13.333 14.168C13.333 13.4776 13.8927 12.918 14.583 12.918C15.2733 12.918 15.833 13.4776 15.833 14.168ZM15.833 14.168V14.5846C15.833 15.275 16.3927 15.8346 17.083 15.8346C17.7733 15.8346 18.333 15.275 18.333 14.5846V14.168C18.333 12.0969 16.6541 10.418 14.583 10.418C12.5119 10.418 10.833 12.0969 10.833 14.168C10.833 16.2391 12.5119 17.918 14.583 17.918" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </div>
                    </div>

                    <p class="text-white group-hover:text-white text-base font-gotham_book w-full leading-tight" data-aos="fade-down">
                        @foreach ($general as $item)
                            {{$item->address}} - {{ $item->district }} - {{ $item->city }}
                        @endforeach
                    </p>
                  </div>
      
                  <div class="flex flex-row gap-2 items-center justify-start" data-aos="fade-down">
                    <div class="flex flex-row">
                      <div class="bg-[#1EA7A2] p-1 rounded-full w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <path d="M1.66699 4.16797L7.42784 7.43849C9.53258 8.63339 10.4681 8.63339 12.5728 7.43849L18.3337 4.16797" stroke="#F2F4FF" stroke-width="1.25" stroke-linejoin="round"/>
                          <path d="M8.75033 16.2487C8.36174 16.2436 7.97268 16.2362 7.58268 16.2264C4.95893 16.1604 3.64706 16.1274 2.70446 15.1807C1.76185 14.2339 1.73461 12.9559 1.68013 10.3999C1.66262 9.57795 1.66261 8.76095 1.68013 7.93906C1.73461 5.38297 1.76184 4.10493 2.70445 3.15819C3.64706 2.21145 4.95893 2.17847 7.58268 2.11251C9.19974 2.07186 10.8009 2.07187 12.418 2.11252C15.0417 2.17848 16.3536 2.21146 17.2962 3.15821C18.2388 4.10494 18.2661 5.38298 18.3205 7.93907C18.3286 8.31746 18.3329 8.49578 18.3336 8.7487" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M15.833 14.168C15.833 14.8583 15.2733 15.418 14.583 15.418C13.8927 15.418 13.333 14.8583 13.333 14.168C13.333 13.4776 13.8927 12.918 14.583 12.918C15.2733 12.918 15.833 13.4776 15.833 14.168ZM15.833 14.168V14.5846C15.833 15.275 16.3927 15.8346 17.083 15.8346C17.7733 15.8346 18.333 15.275 18.333 14.5846V14.168C18.333 12.0969 16.6541 10.418 14.583 10.418C12.5119 10.418 10.833 12.0969 10.833 14.168C10.833 16.2391 12.5119 17.918 14.583 17.918" stroke="#F2F4FF" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </div>
                    </div>
                    <p class="text-white group-hover:text-white text-base font-gotham_book w-full leading-tight">
                        @foreach ($general as $item)
                            {!! str_replace(',', '<br>', $item->schedule) !!}
                        @endforeach
                    </p>
                  </div>
          </div>
      </div>
      
  </section>
      
  @if (count($faqs) > 0)
    <section class="bg-cover bg-opacity-100 relative py-10 lg:py-16" 
              style="background-image: url('{{asset('images/img/textura6.png')}}');">
              <div class="px-[5%] md:px-[10%] flex flex-col gap-5 md:gap-10">
                      

                  <div class="flex flex-col items-center justify-center gap-5">
                      <div class="flex flex-col gap-1 max-w-3xl text-center" data-aos="fade-down">
                          <h2 class="font-gotham_bold text-white text-4xl lg:text-5xl leading-none"> {{$textoscontacto->title3section ?? "Ingrese texto"}} <span class="text-[#21149E]">{{$textoscontacto->title3section2}}</span></h2>
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

                
              </div>  
    </section>
  @endif 

</main>


@section('scripts_importados')
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

@stop

@stop
