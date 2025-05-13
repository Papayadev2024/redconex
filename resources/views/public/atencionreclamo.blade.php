@extends('components.public.matrix')

@section('css_importados')
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #21149E !important;
            border-radius: 0.5rem !important;
            height: auto !important;
            padding: 0.5rem 0.75rem !important;
            background-color:rgba(255, 255, 255, 0.1)!important;
            min-width: 300px !important;
        }

        /* Estilo cuando está enfocado */
        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #ffffff !important;
            outline: 0 !important;
            box-shadow: none !important;
        }

        /* Estilo del texto */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #ffffff !important;
            font-family: 'gotham_book', sans-serif !important;
            font-size: 1rem !important;
            line-height: 1.5 !important;
            padding: 0 !important;
        }

        /* Para pantallas grandes */
        @media (min-width: 1536px) {
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                font-size: 1.25rem !important;
            }
        }

        /* Estilo de la flecha desplegable */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100% !important;
        }

        .select2-search__field{
            border-color: #21149E !important;
            outline: 0 !important;
            box-shadow: none !important;
        }

        .select2-results__message{
            font-size: 12px !important;
        }

        .select2-container--default .select2-results__option--selected{
            font-family: 'gotham_book', sans-serif !important;
        }

      
        .select2-results__option--selectable{
            font-family: 'gotham_book', sans-serif !important;
        }

        .select2-results__option {
            font-family: 'gotham_book', sans-serif !important;
        }

        .select2-results__option--disabled{
            color: #0000005f !important;
        }

        .select2-container{
            width: 100% !important;
        }
    
    </style>
@stop


@section('content')



    <main>
        
        <section  class="bg-cover bg-center pt-16"  style="background-image:url({{asset('images/img/texturanosotros.png')}})">
            
            <section class="flex flex-col justify-start items-center px-[5%] xl:px-[8%] py-10 lg:py-0 relative">
                <div class="flex flex-col gap-1 max-w-xl text-center mx-auto">
                    <h2 class="font-gotham_bold text-white text-3xl" data-aos="fade-down">
                        COMPLETE EL FORMULARIO
                    </h2>
                </div>
            </section>

            <section class="flex flex-col justify-start items-start px-[5%] py-10 lg:py-12 relative max-w-4xl mx-auto">

                <div class="grid grid-cols-1">
                    
                    
                    <form action="{{ route('claims.store') }}" method="POST" x-data="{ paso: 1 }" class="w-full"
                        x-data="{
                            paso: 1,
                            // Modelos para los campos del Paso 1
                            project: '',
                            name_dad: '',
                            name_mom: '',
                            birthay: '',
                            address_birthay: '',
                            // Estado de errores
                            errors: {
                                project: false,
                                name_dad: false,
                                name_mom: false,
                                birthay: false,
                                address_birthay: false
                            },
                            // Función para validar campos
                            validateStep1() {
                                this.errors.project = !this.project;
                                this.errors.name_dad = !this.name_dad;
                                this.errors.name_mom = !this.name_mom;
                                this.errors.birthay = !this.birthay;
                                this.errors.address_birthay = !this.address_birthay;
                                
                                return !Object.values(this.errors).some(error => error);
                            }
                        }" 
                    >
                        @csrf

                        {{-- Paso 1 --}}
                        <div x-show="paso === 1" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            
                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Tipo de servicio</h2>
                            
                            <div class="relative">
                                <select x-model="project"  @change="errors.project = false" name="project" id="project" placeholder="Seleccione" 
                                    class="customselect peer min-w-[300px] font-gotham_book">
                                    <option value="" disabled selected >Seleccione</option>
                                    <option value="Telefonia fija">Telefonia fija</option>
                                    <option value="Internet fijo">Internet fijo</option>
                                </select>
                                <span x-show="errors.project" class="text-red-400 text-xs mt-1 block">Por favor seleccione el tipo de servicio</span>
                            </div>

                            <div class="md:col-span-2 flex flex-row px-4 py-2.5 bg-[#D1ECF1] items-center justify-start gap-3">
                                <i class="fa fa-exclamation-circle fa-2x mr-2 text-[#0c5460]" aria-hidden="true"></i> 
                                <span class="text-sm 2xl:text-lg text-[#0c5460] font-gotham_book font-semibold">Recuerda que al menos 02 de las siguientes preguntas deberán ser respondidas correctamente (Resolución N° 00002-2021-GG/OSIPTEL).</span>   
                            </div>
                            
                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos de verificación</h2>

                            <div class="relative">
                                <label for="name_dad" class="font-gotham_book text-sm text-white">Nombre del padre</label>
                                <input  x-model="name_dad" @input="errors.name_dad = false" type="text" name="name_dad" id="name_dad" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.name_dad" class="text-red-400 text-xs mt-1 block">Por favor ingrese el nombre del padre</span>
                            </div>
                            
                            <div class="relative">
                                <label for="name_mom" class="font-gotham_book text-sm text-white">Nombre de la madre</label>
                                <input x-model="name_mom" @input="errors.name_mom = false" type="text" name="name_mom" id="name_mom" placeholder=""
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.name_mom" class="text-red-400 text-xs mt-1 block">Por favor ingrese el nombre de la madre</span>
                            </div>

                            <div class="relative">
                                <label for="birthay" class="font-gotham_book text-sm text-white">Fecha de nacimiento</label>
                                <input x-model="birthay" @change="errors.birthay = false" type="date" name="birthay" id="birthay" placeholder=""
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.birthay" class="text-red-400 text-xs mt-1 block">Por favor ingrese su fecha de nacimiento</span>
                            </div>

                            <div class="relative">
                                <label for="address_birthay" class="font-gotham_book text-sm text-white">Lugar de nacimiento</label>
                                <input x-model="address_birthay" @input="errors.address_birthay = false" type="text" name="address_birthay" id="address_birthay" placeholder=""
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.address_birthay" class="text-red-400 text-xs mt-1 block">Por favor ingrese su lugar de nacimiento</span>
                            </div>

                            <button type="button" @click="if(!validateStep1()) { return } else { paso = 2 }"  class="md:col-span-2 bg-[#F07407] text-white text-lg font-gotham_medium px-12 py-2 rounded mx-auto mt-3">
                                Continuar
                            </button>

                            
                        
                        </div>
                    
                        {{-- Paso 2 --}}
                        <div x-show="paso === 2" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            
                            <div class="md:col-span-2 flex flex-row px-4 py-2.5 bg-[#D1ECF1] items-center justify-start gap-3">
                                <i class="fa fa-exclamation-circle fa-2x mr-2 text-[#0c5460]" aria-hidden="true"></i> 
                                <span class="text-sm 2xl:text-lg text-[#0c5460] font-gotham_book font-semibold">Recuerda que estos datos son únicamente para validar tu condición de abonado/usuario del servicio de Win.</span>   
                            </div>
                    
                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Condición de quién presenta el reclamo</h2>
                            
                            <div class="relative overflow-hidden">
                                <select type="text" name="type_person" id="type_person" placeholder="Seleccione" 
                                    class="customselect min-w-[300px] font-gotham_book">
                                    <option value="" disabled selected >Seleccione</option>
                                    <option value="Titular">Titular</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos del titular</h2>


                            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5 relative overflow-hidden">
                                <select name="role" id="role" placeholder="Seleccione" 
                                    class="customselect min-w-[300px] font-gotham_book">
                                    <option value="" disabled selected >Seleccione</option>
                                    <option value="Persona natural">Persona natural</option>
                                    <option value="Persona juridica">Persona jurídica</option>
                                </select>
                            </div>

                            <div class="md:col-span-2 hidden" id="naturalFields">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="relative">
                                        <label for="type_document" class="font-gotham_book text-sm text-white">Tipo de documento de identidad</label>
                                        <div class="flex flex-col mt-1.5">
                                            <select type="text" name="type_document" id="type_document" placeholder="Seleccione" 
                                                class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                                <option value="" disabled selected >Seleccione</option>
                                                <option value="CE">Carné de extranjería (CE)</option>
                                                <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                                <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label for="doc_number" class="font-gotham_book text-sm text-white">N° del documento de Identidad</label>
                                        <input type="text" name="doc_number" id="doc_number" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                    </div>

                                    <div class="relative">
                                        <label for="name_titular" class="font-gotham_book text-sm text-white">Nombres del titular</label>
                                        <input type="text" name="name_titular" id="name_titular" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                    </div>

                                    <div class="relative">
                                        <label for="lastname_titular" class="font-gotham_book text-sm text-white">Apellidos del titular</label>
                                        <input type="text" name="lastname_titular" id="lastname_titular" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-2 hidden" id="juridicaFields">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="relative">
                                        <label for="RUC" class="text-white text-sm">RUC</label>
                                        <input type="text" id="RUC" name="RUC"
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                                    </div>
                                    <div class="relative">
                                        <label for="name_business" class="text-white text-sm">Razón Social</label>
                                        <input type="text" id="name_business" name="name_business"
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                                    </div>
                                </div>
                            </div>


                            <div class="relative">
                                <label for="address_dep" class="font-gotham_book text-sm text-white">Departamento de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="address_dep" id="address_dep" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_prov" class="font-gotham_book text-sm text-white">Provincia de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="address_prov" id="address_prov" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_district" class="font-gotham_book text-sm text-white">Distrito de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="address_district" id="address_district" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>


                            <div class="md:col-span-2 relative">
                                <label for="adress_location" class="font-gotham_book text-sm text-white">Dirección de instalación</label>
                                <input type="text" id="adress_location" name="adress_location"
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                            </div>

                            <div class="md:col-span-2 relative">
                                <label for="code_service" class="font-gotham_book text-sm text-white">Código del servicio o del contrato de abonado</label>
                                <input type="text" id="code_service" name="code_service"
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                            </div>

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos del reclamante / Datos del representante Legal</h2>

                            <div class="relative">
                                <label for="type_document_legal" class="font-gotham_book text-sm text-white">Tipo de Documento de Identidad</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="type_document_legal" id="type_document_legal" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="doc_number_legal" class="font-gotham_book text-sm text-white">N° del documento de Identidad</label>
                                <input type="text" id="doc_number_legal" name="doc_number_legal"
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                            </div>

                            <div class="relative">
                                <label for="name_legal" class="font-gotham_book text-sm text-white">Nombres del reclamante/representante legal</label>
                                <input type="text" name="name_legal" id="name_legal" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="relative">
                                <label for="lastname_legal" class="font-gotham_book text-sm text-white">Apellidos del reclamante/representante legal</label>
                                <input type="text" name="lastname_legal" id="lastname_legal" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="relative">
                                <label for="address_email" class="font-gotham_book text-sm text-white">Dirección de correo electrónico</label>
                                <input type="email" name="address_email" id="address_email" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="relative">
                                <label for="phone_mobile" class="font-gotham_book text-sm text-white">Contacto de referencia (móvil o fijo)</label>
                                <input type="text" name="phone_mobile" id="phone_mobile" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="md:col-span-2 relative flex flex-row justify-between gap-10">
                                <p class="font-gotham_book text-sm text-white w-full">Se adjunta carta poder simple con la firma del usuario u otro documento que acredite la representación</p>
                                
                                <div class="flex justify-content-center w-25 font-gotham_light font-semibold text-sm text-white">
                                    <label class="mr-4 flex flex-row items-center">
                                        Si <input class="text-medium ml-2" type="radio" name="doc_archive" value="1">
                                    </label>
                                    <label class="flex flex-row items-center">
                                        No <input class="text-medium ml-2" type="radio" name="doc_archive" value="0">
                                    </label>
                                </div>
                            </div>

                            <div class="relative md:col-span-2 hidden" id="archiveContainer">
                                <label for="archive" class="font-gotham_book text-sm text-white">Adjuntar poder</label>
                                <input type="file" name="archive" id="archive" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos para la notificación</h2>

                            <div class="md:col-span-2 relative flex flex-row justify-between gap-10">
                                <p class="font-gotham_book text-sm text-white w-full">Autorizo ser notificado por el correo electrónico registrado</p>
                                
                                <div class="flex justify-content-center w-25 font-gotham_light font-semibold text-sm text-white">
                                    <label class="mr-4 flex flex-row items-center">
                                        Si <input class="text-medium ml-2" type="radio" name="notification" value="1">
                                    </label>
                                    <label class="flex flex-row items-center">
                                        No <input class="text-medium ml-2" type="radio" name="notification" value="0">
                                    </label>
                                </div>
                            </div>

                            <div class="relative md:col-span-2">
                                <label for="address_email_noti" class="font-gotham_book text-sm text-white">Dirección de correo electrónico</label>
                                <input type="email" name="address_email_noti" id="address_email_noti" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="relative">
                                <label for="address_dep_noti" class="font-gotham_book text-sm text-white">Departamento de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="address_dep_noti" id="address_dep_noti" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_prov_noti" class="font-gotham_book text-sm text-white">Provincia de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="address_prov_noti" id="address_prov_noti" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_district_noti" class="font-gotham_book text-sm text-white">Distrito de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="address_district_noti" id="address_district_noti" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="relative md:col-span-2">
                                <label for="address_location_noti" class="font-gotham_book text-sm text-white">Dirección</label>
                                <input type="text" name="address_location_noti" id="address_location_noti" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="relative md:col-span-2">
                                <label for="address_reference_noti" class="font-gotham_book text-sm text-white">Referencia</label>
                                <input type="text" name="address_reference_noti" id="address_reference_noti" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos del reclamo</h2>

                            <div class="md:col-span-2 relative">
                                <label for="claim_issue" class="font-gotham_book text-sm text-white">Materia de reclamo</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="claim_issue" id="claim_issue" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione una opción</option>
                                        <option value="Facturación y cobro">Facturación y cobro</option>
                                        <option value="Incumplimiento de condiciones contractuales, ofertas y promociones">Incumplimiento de condiciones contractuales, ofertas y promociones</option>
                                        <option value="Falta De Servicio">Falta De Servicio</option>
                                        <option value="Contratación no solicitada">Contratación no solicitada</option>
                                        <option value="Migración">Migración</option>
                                        <option value="Calidad e idoneidad en la prestación del servicio">Calidad e idoneidad en la prestación del servicio</option>
                                        <option value="Instalación, activación o traslado del servicio">Instalación, activación o traslado del servicio</option>
                                        <option value="Recargas">Recargas</option>
                                        <option value="Portabilidad">Portabilidad</option>
                                        <option value="La negativa a contratar el servicio">La negativa a contratar el servicio</option>
                                        <option value="Otras materias reclamables">Otras materias reclamables</option>
                                    </select>
                                </div>
                            </div>

                            <div class="md:col-span-2 relative">
                                <label for="claim_issue_second" class="font-gotham_book text-sm text-white">Problema específico</label>
                                <div class="flex flex-col mt-1.5">
                                    <select type="text" name="claim_issue_second" id="claim_issue_second" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione una opción</option>
                                      
                                    </select>
                                </div>
                            </div>

                            <div class="relative md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5" id="sectionDinamyc">
                                <div class="relative md:col-span-2">
                                    <label for="amount_claim" class="font-gotham_book text-sm text-white">Monto reclamado (S/)</label>
                                    <input type="text" name="amount_claim" id="amount_claim" placeholder="" 
                                        class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                </div>

                                <h2 class="md:col-span-2 text-white font-gotham_book text-lg">Adjuntar recibo(s) objeto de reclamo o indicar alguna de las siguientes opciones:</h2>

                                <div class="md:col-span-2 relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                                    
                                    <div class="relative">
                                        <label for="number_recibe" class="font-gotham_book text-sm text-white">N° del recibo</label>
                                        <input type="text" name="number_recibe" id="number_recibe" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                    </div>

                                    <div class="relative">
                                        <label for="date_emision" class="font-gotham_book text-sm text-white">Fecha de emisión</label>
                                        <input type="date" name="date_emision" id="date_emision" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                    </div>

                                    <div class="relative">
                                        <label for="date_finish" class="font-gotham_book text-sm text-white">Fecha de vencimiento</label>
                                        <input type="date" name="date_finish" id="date_finish" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                    </div>

                                </div>
                            </div>

                            <div class="relative md:col-span-2">
                                <label for="claim" class="font-gotham_book text-sm text-white">Detalle del inconveniente (máximo 5000 caracteres)</label>
                                <textarea rows="4" name="claim" id="claim" placeholder="Indicanos cual es su malestar/inconveniente" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60"></textarea>
                            </div>

                            <div class="md:col-span-2 relative flex flex-row justify-between gap-10">
                                <p class="font-gotham_book text-sm text-white w-full">¿Se adjunta información adicional?</p>
                                
                                <div class="flex justify-content-center w-25 font-gotham_light font-semibold text-sm text-white">
                                    <label class="mr-4 flex flex-row items-center">
                                        Si <input class="text-medium ml-2" type="radio" name="doc_aditional" value="1">
                                    </label>
                                    <label class="flex flex-row items-center">
                                        No <input class="text-medium ml-2" type="radio" name="doc_aditional" value="0">
                                    </label>
                                </div>
                            </div>

                            <div class="relative md:col-span-2 hidden" id="archiveContainersecond">
                                <label for="archive_aditional" class="font-gotham_book text-sm text-white">Adjuntar poder</label>
                                <input type="file" name="archive_aditional" id="archive_aditional" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="md:col-span-2 flex flex-row px-4 py-5 bg-[#D1ECF1] items-start justify-start gap-3">
                                <i class="fa fa-at fa-2x mr-2  text-[#0c5460]" aria-hidden="true"></i> 
                                <span class="text-sm 2xl:text-lg text-[#0c5460] font-gotham_book font-semibold">
                                    Al brindar mi correo electrónico, autorizo a que cualquier comunicación respecto al reclamo 
                                    se realice a través del mismo WIN-NET TELECOM S.A.C. (en adelante, “WIN”), con RUC N° 20521233991, 
                                    domiciliado en Av. República de Panamá Nro. 3418 Int. 2301, urb. Limatambo, distrito de San Isidro, 
                                    provincia y departamento de Lima, es el titular del Banco de Datos Personales denominado “Quejas y R
                                    eclamos”, cuyo código de registro es RNPDP-PJP N° 25896. De conformidad con el artículo 18° de la Ley 
                                    de Protección de datos personales le informamos que sus datos serán tratados por nuestro personal a 
                                    efectos de atender su reclamo o queja. Para mayor información respecto al tratamiento de sus datos 
                                    personales sírvase ingresar a nuestra Política de Privacidad. En caso quisiera ejercer sus derechos de 
                                    acceso, rectificación, cancelación, oposición e información, sírvase llenar el siguiente Formulario de 
                                    Atención de Derechos ARCO. Cabe indicar que los datos personales que usted proporciona en el presente 
                                    documento (que podrían contener datos sensibles) serán utilizados y/o tratados por WIN, estricta y 
                                    únicamente con la finalidad de realizar las actividades conducentes a atender su reclamo.
                                </span>   
                            </div>


                            
                            <div class="md:col-span-2 flex justify-between">
                                <button type="button" @click="paso = 1" class="md:col-span-2 bg-[#9b9692] text-white text-lg font-gotham_medium px-12 py-2 rounded mx-auto mt-3">
                                    Atrás
                                </button>
                                <button type="submit" class="md:col-span-2 bg-[#F07407] text-white text-lg font-gotham_medium px-12 py-2 rounded mx-auto mt-3">
                                    Enviar
                                </button>
                            </div>

                        </div>
                        
                        <p class="md:col-span-2 text-center text-white font-gotham_book text-sm py-6">Al hacer clic en CONTINUAR aceptas haber leído nuestra <a class="cursor-pointer" id="linkPoliticas_second"><span class="text-[#F07407]"> política de privacidad.</span></a></p>
                            
                        <div class="flex flex-col justify-start gap-3 p-4 w-full md:col-span-2 border border-white font-gotham_light text-white">
                            
                            <h3 class="font-semibold text-base">Acceso al Expediente de Reclamos:</h3>
                            <p class="text-sm">En caso necesites conocer el estado de tu expediente de reclamo, puedes comunicarte a nuestro Canal de Atención telefónico (01) 707 3000. Esta solicitud será atendida en un plazo máximo de tres (3) días hábiles.</p>
                            
                            <h3 class="font-semibold text-base mt-3">Plazo para la Resolución de Reclamos</h3>
                            <p class="text-sm">Los reclamos presentados por los usuarios ante la empresa operadora serán resueltos en los siguientes plazos máximos:</p>
                        
                            <p class="text-sm">1. Hasta en tres (3) días hábiles, contados desde el día siguiente de su presentación ante la empresa operador en reclamos por:</p>

                            <ul class="list-disc ml-8">
                                <li class="text-sm">Calidad e idoneidad en la prestación del servicio.</li>
                                <li class="text-sm">Falta del servicio público móvil y/o bloqueo del equipo terminal móvil, por uso prohibido del servicio en establecimientos penitenciarios.</li>
                                <li class="text-sm">Falta de entrega del recibo o de la copia del recibo o de la facturación detallada solicitada por el usuario.</li>
                                <li class="text-sm">Portabilidad numérica y la Negativa a brindar la facturación detallada o llamadas entrantes.</li>
                                <li class="text-sm">Baja o suspensión del servicio no solicitada.</li>
                            </ul>
                        
                            <p class="text-sm">2. Hasta en quince (15) días hábiles, contados desde el día siguiente de su presentación ante la empresa operadora, en reclamos por:</p>

                            <ul class="list-disc ml-8">
                                <li class="text-sm">Facturación cuyo monto reclamado sea de hasta 0.5% de la Unidad Impositiva Tributaria.</li>
                                <li class="text-sm">Tarjetas de pago.</li>
                                <li class="text-sm">Instalación o activación del servicio.</li>
                                <li class="text-sm">Traslado del servicio.</li>
                            </ul>
                        
                            <p class="text-sm">3. Hasta veinte (20) días hábiles, contados desde el día siguiente de su presentación ante la empresa operadora, en los demás casos.</p>

                            <ul class="list-disc ml-8">
                                <li class="text-sm">Incumplimiento de condiciones contractuales, ofertas y promociones</li>
                                <li class="text-sm">Falta de ejecución de baja o suspensión del servicio</li>
                                <li class="text-sm">Contratación no solicitada</li>
                                <li class="text-sm">Migración</li>
                                <li class="text-sm">Negativa a contratar el servicio</li>
                                <li class="text-sm">Facturación y cobro cuyo monto reclamado sea de mayor a 0.5% de la Unidad Impositiva Tributaria</li>
                            </ul>

                            <p class="text-sm mt-3">Para las materias de reclamo que hayan sido previstas en otras normas, se aplica el plazo que haya sido señalado en las mismas, en caso contrario, se regirán por el plazo mayor que establece el presente Reglamento.</p>

                        
                        </div>

                    </form>
                </div>

            </section>    
            
        
        </section>

    </main>



@section('scripts_importados')

    <script>
        $(document).ready(function() {
            $('.customselect').select2({
                minimumResultsForSearch: -1 
            });
        });
        $.fn.select2.defaults.set('language', 'es');
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar Select2
            $('#role').select2({
                placeholder: "Seleccione",
                minimumResultsForSearch: Infinity // Oculta la búsqueda
            });
        
            const naturalFields = document.getElementById('naturalFields');
            const juridicaFields = document.getElementById('juridicaFields');


            const clearFields = (ids) => {
                ids.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.value = '';
                        if (el.classList.contains('select2-hidden-accessible')) {
                            $(el).val(null).trigger('change');
                        }
                    }
                });
            };
        
            // Manejar el cambio en el Select2
            $('#role').on('change', function(e) {
                const value = $(this).val();
                
                if (value === 'Persona natural') {
                    naturalFields.classList.remove('hidden');
                    juridicaFields.classList.add('hidden');
                    clearFields(['RUC', 'name_business']);
                } 
                else if (value === 'Persona juridica') {
                    juridicaFields.classList.remove('hidden');
                    naturalFields.classList.add('hidden');
                    clearFields(['type_document', 'doc_number', 'name_titular', 'lastname_titular']);
                } 
                else {
                    naturalFields.classList.add('hidden');
                    juridicaFields.classList.add('hidden');
                }
            });
        
            // También puedes disparar el evento change al cargar si hay un valor seleccionado
            if ($('#role').val()) {
                $('#role').trigger('change');
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const radios = document.querySelectorAll('input[name="doc_aditional"]');
            const archiveContainer = document.getElementById('archiveContainer');
            const archiveInput = document.getElementById('archive');
    
            radios.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (radio.value === "1" && radio.checked) {
                        archiveContainer.classList.remove('hidden');
                    } else if (radio.value === "0" && radio.checked) {
                        archiveContainer.classList.add('hidden');
                        archiveInput.value = ''; // Limpiar input file
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const radios = document.querySelectorAll('input[name="doc_aditional"]');
            const archiveContainer = document.getElementById('archiveContainersecond');
            const archiveInput = document.getElementById('archive_aditional');
    
            radios.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (radio.value === "1" && radio.checked) {
                        archiveContainer.classList.remove('hidden');
                    } else if (radio.value === "0" && radio.checked) {
                        archiveContainer.classList.add('hidden');
                        archiveInput.value = ''; // Limpiar input file
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            const secondOptions = {
                "Facturación y cobro": [
                    "Montos por prorrateo",
                    "Monto por cargo de reconexión",
                    "Cálculo de los consumos facturados",
                    "Pagos no procesados o registrados",
                    "Montos no facturados oportunamente",
                    "La tarifa aplicada de consumos adicionales facturados",
                    "Otro monto correspondiente a cualquier concepto facturado en el recibo cuyo consumo se desconoce",
                    "La aplicación del incremento tarifario no comunicado previamente al abonado",
                    "Cobros de equipos o por reintegro del descuento vinculados a la permanencia del servicio",
                ],
                "Incumplimiento de condiciones contractuales, ofertas y promociones": [
                    "La aplicación de condiciones y tarifas del plan contratado distintas a las pactadas en el contrato",
                    "Incumplimiento de ofertas o promociones ofrecidas y/o contratadas",
                    "Descuentos no reconocidos de los atributos y/o beneficios del plan contratado, oferta y/o promoción",
                    "La omisión de información o inexacta sobre cobertura u otras características o limitaciones del servicio servicios adicionales o suplementarios",
                ],
                "Falta De Servicio": [
                    "Suspensión, corte o baja injustificado del servicio",
                    "Suspensión del servicio por uso prohibido en establecimientos peritenciarios",
                    "Falta de reactivación del servicio pese al pago del recibo",
                    "Interrupción injustificada del servicio",
                    "Cambio de titularided del servicio o reposición de SIM card sin consentimiento del abonado",
                ],
                "Falta de ejecución de baja o suspensión del servicio": [
                    "Falta con la ejecución de la baja del servicio",
                    "Falta con la ejecución de la suspensión temporal del servicio",
                    "Montos posteriores a la fecha en que se efectuó la baja",
                    "Montos posteriores a la fecha en que se efectuó la baja o suspensión temporal",
                ],
                "Contratación no solicitada": [
                    "Desconocimiento del abonado de la contratación del servicio",
                    "Desconoce contratación o afiliación a servicios adicionales o suplementarios",
                    "Desconoce contrato adquirido o financiamiento de equipo con cargo en el recibo",
                ],
                "Migración": [
                    "Condicionamiento, negativa o falta de respuesta a la solicitud de la migración",
                    "Falta de ejecución de la migración dentro del plazo establecido",
                    "Facturación corresponde al plan anterior",
                ],
                "Calidad e idoneidad en la prestación del servicio": [
                    "Problema con la prestación de servicio de Internet",
                    "Comunicaciones entrecortadas, ruido o otros",
                    "Intermitencia",
                    "Lentitud",
                    "Avería",
                ],
                "Instalación, activación o traslado del servicio": [
                    "Falta de instalación o activación",
                    "Falta de traslado del servicio solicitado por el abonado",
                    "Falta de respuesta a la solicitud de trasladado o negativa",
                    "Falta de devolución de los montos cobrados por instalación, activación o traslado no ejecutados",
                ],
                "Recargas": [
                    "Falta de asignación de saldo o atributos",
                    "Descuentos indebidos de los saldos o del crédito"
                ],
                "Portabilidad": [
                    "Negativa a recibir la solicitud de portabilidad",
                    "Rechazo a la solicitud de portabilidad",
                    "Falta de entrega de información sobre portabilidad",
                    "Falta de consentimiento del abonado para efectuar la portabilidad",
                    "Falta de retorno del número telefónico",
                    "Falta de cobertura",
                ],
                "La negativa a contratar el servicio": [],
                "Otras materias reclamables": [
                    "Negativa a contratar el servicio",
                    "Falta de entrega de recibos",
                    "Negativa a brindar la facturación detallada",
                    "Negativa a brindar detalle de llamadas entrantes",
                    "Cambio de titularidad no ejecutada",
                ]
            };
    
            // Opciones del segundo select que deben mostrar el bloque dinámico
            const showSectionForSecond = new Set([
                "Montos por prorrateo",
                "Monto por cargo de reconexión",
                "Cálculo de los consumos facturados",
                "Pagos no procesados o registrados",
                "Interrupción injustificada del servicio",
                "Falta de reactivación del servicio pese al pago del recibo"
            ]);
    
            function clearSectionFields() {
                $('#sectionDinamyc').find('input').val('');
            }
    
            function hideSecondSelectAndSection() {
                $('#claim_issue_second').parent().parent().hide();
                $('#claim_issue_second').val('');
                $('#sectionDinamyc').hide();
                clearSectionFields();
            }
    
            // Al cambiar el primer select
            $('#claim_issue').on('change', function () {
                const selected = $(this).val();
                const secondSelect = $('#claim_issue_second');
    
                secondSelect.empty().append('<option value="" disabled selected>Seleccione una opción</option>');
                clearSectionFields();
                $('#sectionDinamyc').hide();
    
                if (secondOptions[selected] && secondOptions[selected].length > 0) {
                    secondOptions[selected].forEach(option => {
                        secondSelect.append(`<option value="${option}">${option}</option>`);
                    });
                    $('#claim_issue_second').parent().parent().show();
                } else {
                    hideSecondSelectAndSection();
                }
            });
    
            // Al cambiar el segundo select
            $('#claim_issue_second').on('change', function () {
                const selectedSecond = $(this).val();
                if (showSectionForSecond.has(selectedSecond)) {
                    $('#sectionDinamyc').show();
                } else {
                    $('#sectionDinamyc').hide();
                    clearSectionFields();
                }
            });
    
            // Estado inicial
            hideSecondSelectAndSection();
            $('#sectionDinamyc').hide();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault();
                
                // Obtener el formulario y el botón de envío
                var form = $(this);
                var submitButton = form.find('button[type="submit"]');
                var originalButtonText = submitButton.html();
                
                // Mostrar spinner y deshabilitar botón
                submitButton.html('<i class="fa fa-spinner fa-spin"></i> Enviando...');
                submitButton.prop('disabled', true);
                
                // Crear FormData para enviar archivos
                var formData = new FormData(this);
        
                // Configurar AJAX
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Restaurar botón
                        submitButton.html(originalButtonText);
                        submitButton.prop('disabled', false);
                        
                        // Mostrar mensaje de éxito
                        if (response.success) {

                            form[0].reset();

                            Swal.fire({
                                icon: 'success',
                                title: '¡Reclamo enviado!',
                                html: `Tu reclamo ha sido registrado correctamente.<br><br>
                                    <strong>Número de reclamo:</strong> ${response.claim_number}<br><br>
                                    Te hemos enviado un correo de confirmación.`,
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                // Redirigir a página de éxito o recargar
                                window.location.href = '/reclamo-exitoso?numero=' + response.claim_number;
                            });
                        } else {
                            // Mostrar error si success es false
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Ocurrió un error al procesar tu reclamo.',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Restaurar botón
                        submitButton.html(originalButtonText);
                        submitButton.prop('disabled', false);
                        
                        // Manejar errores de validación
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessages = '';
                            
                            // Construir mensaje de error
                            $.each(errors, function(key, value) {
                                errorMessages += value.join('<br>') + '<br>';
                            });
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Error en el formulario',
                                html: errorMessages,
                                confirmButtonText: 'Aceptar'
                            });
                        } else {
                            // Mostrar error genérico
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Ocurrió un error al enviar el reclamo. Por favor, inténtalo nuevamente.',
                                confirmButtonText: 'Aceptar'
                            });
                            console.error('Error:', error);
                        }
                    }
                });
            });
        });
    </script>
@stop

@stop
