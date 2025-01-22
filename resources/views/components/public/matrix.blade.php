<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="@yield('meta_title', 'Default Title')">
    <meta name="description" content="@yield('meta_description', 'Default Description')">
    <meta name="keywords" content="@yield('meta_keywords', 'default, keywords')">
    <title>{{ ucwords(strtolower($pagina ?? 'Pagina'))  }} | {{ config('app.name', 'Laravel') }}</title>
    
    
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    @stack('head')

    {{-- Aqui van los CSS --}}
    @yield('css_importados')

    {{-- Swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    
    {{-- Modal Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
   
    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

</head>

<body class="body">
    {{-- <div class="overlay"></div> --}}
    @include('components.public.header')

    <div class="main">
       
        @include('components.public.sidebar')  

        @yield('content')

    </div>



    @include('components.public.footer')



    @yield('scripts_importados')
    {{-- @vite(['resources/js/functions.js']) --}}
    {{-- <script src="{{ asset('js/functions.js') }}"></script> --}}
    <script src="{{ asset('js/function.js') }}"></script>
    <script src="{{ asset('js/carrito.js') }}"></script>

    <script>
        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarTelefono(value) {

            if (value !== '') {
                if (isNaN(value)) {
                    alerta("Por favor, asegúrate de ingresar solo números en el teléfono");
                    return false;
                }
            }

            if (value.length < 9) {
                alerta("El teléfono solo puede tener 9 dígitos");
                return false;
            }

            return true;
        }

        function validarEmail(value) {
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("Por favor, asegúrate de ingresar una dirección de correo electrónico válida");
                return false;
            }
            return true;
        }

        $('#formContactos').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();


            if (!validarTelefono($('#telefonoContacto').val())) {
                return;
            };

            if (!validarEmail($('#emailContacto').val())) {
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
                url: '{{ route('guardarContactos') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#formContactos')[0].reset();
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
                                text: e,
                                icon: "error",
                            });
                            flag = true;
                        }
                    });
                }
            });
        })


        $('#dataWhatsapp').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();

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
                url: '{{ route('guardarContactoWsp') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#dataWhatsapp')[0].reset();
                    window.location.href = 'https://api.whatsapp.com/send?phone={{ $general[0]->whatsapp }}&text={{ $general[0]->mensaje_whatsapp }}';
                    

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
                                text: e,
                                icon: "error",
                            });
                            flag = true;
                        }
                    });
                }
            });
        })


        $('#dataWhatsapp2').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();

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
                url: '{{ route('guardarContactoWsp') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#dataWhatsapp2')[0].reset();
                    window.location.href = 'https://api.whatsapp.com/send?phone={{ $general[0]->whatsapp2 }}&text={{ $general[0]->mensaje_whatsapp }}';
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
                                text: e,
                                icon: "error",
                            });
                            flag = true;
                        }
                    });
                }
            });
        })

        $('#formProducto').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();


            if (!validarTelefono($('#telefonoContacto').val())) {
                return;
            };

            if (!validarEmail($('#emailContacto').val())) {
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
                url: '{{ route('guardarProducto') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#formProducto')[0].reset();
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
                                text: e,
                                icon: "error",
                            });
                            flag = true;
                        }
                    });
                }
            });
        })

        $('#footerFormulario').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarEmail($('#emailFooter').val())) {
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
                url: '{{ route('subscripciones.guardar') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    //Falta limpiar el radio del form contacto

                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });
                    $('#footerFormulario')[0].reset();
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
                                text: "Usuario ya existente",
                                icon: "error",
                            });
                            flag = true; // Marcar como mostrado
                        }
                    });
                }
            });
        })

        $('#footerBlog_Catalogo').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarEmail($('#emailFooter2').val())) {
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
                url: '{{ route('subscripciones.guardar2') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {
                    //Falta limpiar el radio del form contacto

                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });
                    $('#footerBlog_Catalogo')[0].reset();
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
                                title: 'Correo existente',
                                text: "La direccion de correo ya existe",
                                icon: "warning",
                            });
                            flag = true; // Marcar como mostrado
                        }
                    });
                }
            });
        })


       
    </script>

</body>

</html>
