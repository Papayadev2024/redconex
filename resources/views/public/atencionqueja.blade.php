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
                    
                    
                    <form action="{{ route('complaint.save') }}" method="POST"  class="w-full" enctype="multipart/form-data"
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
                            // Modelos para los campos del Paso 2
                            type_person: '',
                            role: '',
                            type_document: '',
                            doc_number: '',
                            name_titular: '',
                            lastname_titular: '',
                            ruc: '',
                            name_business: '',
                            address_dep: '',
                            address_prov: '',
                            address_district: '',
                            adress_location: '',
                            code_service: '',
                            type_document_legal: '',
                            doc_number_legal: '',
                            name_legal: '',
                            lastname_legal: '',
                            address_email: '',
                            phone_mobile: '',
                            doc_archive: null,
                            archive: null,
                            notification: null,
                            address_email_noti: '',
                            address_location_noti: '',
                            address_reference_noti: '',
                            claim_number: '',
                            claim_issue: '',
                            claim: '',
                            doc_aditional: '',
                            // Estado de errores Paso 2
                            errorsStep2: {
                                type_person: false,
                                role: false,
                                type_document: false,
                                doc_number: false,
                                name_titular: false,
                                lastname_titular: false,
                                ruc: false,
                                name_business: false,
                                address_dep: false,
                                address_prov: false,
                                address_district: false,
                                adress_location: false,
                                code_service: false,
                                type_document_legal: false,
                                doc_number_legal: false,
                                name_legal: false,
                                lastname_legal: false,
                                address_email: false,
                                phone_mobile: false,
                                doc_archive: false,
                                notification: false,
                                address_email_noti: false,
                                address_location_noti: false,
                                claim_number: false,
                                claim_issue: false,
                                claim: false,
                                doc_aditional: false,
                            },

                            // Función para validar campos
                            validateStep1() {
                                this.errors.project = this.project === '';
                                this.errors.name_dad = !this.name_dad;
                                this.errors.name_mom = !this.name_mom;
                                this.errors.birthay = !this.birthay;
                                this.errors.address_birthay = !this.address_birthay;
                                
                                return !Object.values(this.errors).some(error => error);
                            },

                            toggleArchiveField() {
                                if(this.doc_archive === '1') {
                                    this.errorsStep2.archive = !this.archive;
                                } else {
                                    this.errorsStep2.archive = false;
                                }
                            },

                            // Función para validar campos del Paso 2
                            validateStep2() {
                                // Validación básica de campos obligatorios
                                this.errorsStep2.type_person = this.type_person === '';
                                this.errorsStep2.role = this.role === '';
                                
                                if(this.role === 'Persona natural') {
                                    this.errorsStep2.type_document = this.type_document === '';
                                    this.errorsStep2.doc_number = !this.doc_number;
                                    this.errorsStep2.name_titular = !this.name_titular;
                                    this.errorsStep2.lastname_titular = !this.lastname_titular;
                                } else if(this.role === 'Persona juridica') {
                                    this.errorsStep2.ruc = !this.ruc;
                                    this.errorsStep2.name_business = !this.name_business;
                                }
                                
                                this.errorsStep2.address_dep = this.address_dep === '';
                                this.errorsStep2.address_prov = this.address_prov === '';
                                this.errorsStep2.address_district = this.address_district === '';
                                this.errorsStep2.adress_location = !this.adress_location;
                                this.errorsStep2.code_service = !this.code_service;
                                this.errorsStep2.type_document_legal = this.type_document_legal === '';
                                this.errorsStep2.doc_number_legal = !this.doc_number_legal;
                                this.errorsStep2.name_legal = !this.name_legal;
                                this.errorsStep2.lastname_legal = !this.lastname_legal;
                                this.errorsStep2.address_email = !this.address_email;
                                this.errorsStep2.phone_mobile = !this.phone_mobile;
                                this.errorsStep2.doc_archive = this.doc_archive === null;
                                this.errorsStep2.notification = this.notification === null;
                                this.errorsStep2.address_email_noti = !this.address_email_noti;
                                this.errorsStep2.address_location_noti = !this.address_location_noti;
                                this.errorsStep2.address_reference_noti = !this.address_reference_noti;
                                this.errorsStep2.claim_number = !this.claim_number;
                                this.errorsStep2.claim_issue = !this.claim_issue;
                                this.errorsStep2.claim = !this.claim;
                                this.errorsStep2.doc_aditional = !this.doc_aditional;
                                
                                return !Object.values(this.errorsStep2).some(error => error);
                            },

                            
                        }" 
                        
                    >
                        @csrf

                        {{-- Paso 1 --}}
                        <div x-show="paso === 1" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            
                            <h2 class="md:col-span-2 text-white font-gotham_light font-semibold text-lg 2xl:text-xl">Tipo de servicio</h2>
                            
                            <div class="relative">
                                <select x-model="project"  name="project" id="project" placeholder="Seleccione" 
                                    class="customselect peer min-w-[300px] font-gotham_book"
                                    x-init="
                                        $nextTick(() => {
                                            $('#project').select2().on('change', function () {
                                                project = this.value;
                                                errors.project = (project === '');
                                            });
                                        });
                                    "
                                    >
                                    <option value="" disabled selected >Seleccione</option>
                                    <option value="Telefonia fija">Telefonia fija</option>
                                    <option value="Internet fijo">Internet fijo</option>
                                </select>
                                <span x-show="errors.project" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">Por favor seleccione el tipo de servicio</span>
                            </div>

                            <div class="md:col-span-2 flex flex-row px-4 py-2.5 bg-[#D1ECF1] items-center justify-start gap-3">
                                <i class="fa fa-exclamation-circle fa-2x mr-2 text-[#0c5460]" aria-hidden="true"></i> 
                                <span class="text-sm 2xl:text-lg text-[#0c5460] font-gotham_book font-semibold">Recuerda que al menos 02 de las siguientes preguntas deberán ser respondidas correctamente (Resolución N° 00002-2021-GG/OSIPTEL).</span>   
                            </div>
                            
                            <h2 class="md:col-span-2 text-white font-gotham_light font-semibold text-lg 2xl:text-xl">Datos de verificación</h2>

                            <div class="relative">
                                <label for="name_dad" class="font-gotham_book text-sm 2xl:text-base text-white">Nombre del padre</label>
                                <input  x-model="name_dad" @input="errors.name_dad = false" type="text" name="name_dad" id="name_dad" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book text-base 2xl:text-lg w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.name_dad" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">Por favor ingrese el nombre del padre</span>
                            </div>
                            
                            <div class="relative">
                                <label for="name_mom" class="font-gotham_book text-sm 2xl:text-base text-white">Nombre de la madre</label>
                                <input x-model="name_mom" @input="errors.name_mom = false" type="text" name="name_mom" id="name_mom" placeholder=""
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book text-base 2xl:text-lg w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.name_mom" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">Por favor ingrese el nombre de la madre</span>
                            </div>

                            <div class="relative">
                                <label for="birthay" class="font-gotham_book text-sm 2xl:text-base text-white">Fecha de nacimiento</label>
                                <input x-model="birthay" @change="errors.birthay = false" type="date" name="birthay" id="birthay" placeholder=""
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book text-base 2xl:text-lg w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.birthay" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">Por favor ingrese su fecha de nacimiento</span>
                            </div>

                            <div class="relative">
                                <label for="address_birthay" class="font-gotham_book text-sm 2xl:text-base text-white">Lugar de nacimiento</label>
                                <input x-model="address_birthay" @input="errors.address_birthay = false" type="text" name="address_birthay" id="address_birthay" placeholder=""
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book text-base 2xl:text-lg w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errors.address_birthay" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">Por favor ingrese su lugar de nacimiento</span>
                            </div>

                            <button type="button" @click="if(!validateStep1()) { return } else { paso = 2 }"  class="md:col-span-2 bg-[#E29720] text-white text-lg font-gotham_medium px-12 py-2 rounded mx-auto mt-3">
                                Continuar
                            </button>

                            
                        
                        </div>
                    
                        {{-- Paso 2 --}}
                        <div x-show="paso === 2" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            
                            <div class="md:col-span-2 flex flex-row px-4 py-2.5 bg-[#D1ECF1] items-center justify-start gap-3">
                                <i class="fa fa-exclamation-circle fa-2x mr-2 text-[#0c5460]" aria-hidden="true"></i> 
                                <span class="text-sm 2xl:text-lg text-[#0c5460] font-gotham_book font-semibold">{!!$atencion->reclamo_header ?? 'Ingrese la descripcion' !!}</span>   
                            </div>
                    
                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Condición de quién presenta el reclamo</h2>
                            
                            <div class="relative overflow-hidden">
                                <select x-model="type_person" name="type_person" id="type_person" placeholder="Seleccione" 
                                    class="customselect min-w-[300px] font-gotham_book"
                                    x-init="
                                        $nextTick(() => {
                                            $('#type_person').select2().on('change', function () {
                                                type_person = this.value;
                                                errorsStep2.type_person = (type_person === '');
                                            });
                                        });
                                    "
                                    >
                                    <option value="" disabled selected >Seleccione</option>
                                    <option value="Titular">Titular</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                                <span x-show="errorsStep2.type_person" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor seleccione la condición
                                </span>
                            </div>

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos del titular</h2>

                            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5 relative overflow-hidden">
                                <select x-model="role" name="role" id="role" placeholder="Seleccione" 
                                    class="customselect min-w-[300px] font-gotham_book"
                                    x-init="
                                        $nextTick(() => {
                                            $('#role').select2().on('change', function () {
                                                role = this.value;
                                                errorsStep2.role = (role === '');
                                            });
                                        });
                                    "
                                    >
                                    <option value="" disabled selected >Seleccione</option>
                                    <option value="Persona natural">Persona natural</option>
                                    <option value="Persona juridica">Persona jurídica</option>
                                </select>
                                <span x-show="errorsStep2.role" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor seleccione el tipo de persona
                                </span>
                            </div>

                            <div class="md:col-span-2 hidden" id="naturalFields">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="relative">
                                        <label for="type_document" class="font-gotham_book text-sm text-white">Tipo de documento de identidad</label>
                                        <div class="flex flex-col mt-1.5">
                                            <select x-model="type_document" name="type_document" id="type_document" placeholder="Seleccione" 
                                                class="customselect min-w-[300px] font-gotham_book w-full mt-1.5"
                                                x-init="
                                                    $nextTick(() => {
                                                        $('#type_document').select2().on('change', function () {
                                                            type_document = this.value;
                                                            errorsStep2.type_document = (type_document === '');
                                                        });
                                                    });
                                                "
                                                >
                                                <option value="" disabled selected >Seleccione</option>
                                                <option value="CE">Carné de extranjería (CE)</option>
                                                <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                                <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                            </select>
                                            <span x-show="errorsStep2.type_document" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                                Por favor seleccione el tipo de documento
                                            </span>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label for="doc_number" class="font-gotham_book text-sm text-white">N° del documento de Identidad</label>
                                        <input x-model="doc_number" @input="errorsStep2.doc_number = false" type="text" name="doc_number" id="doc_number" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                        <span x-show="errorsStep2.doc_number" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                            Por favor ingrese el número de documento
                                        </span>
                                    </div>

                                    <div class="relative">
                                        <label for="name_titular" class="font-gotham_book text-sm text-white">Nombres del titular</label>
                                        <input x-model="name_titular" @input="errorsStep2.name_titular = false" type="text" name="name_titular" id="name_titular" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                        <span x-show="errorsStep2.name_titular" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                                Por favor ingrese los nombres
                                        </span>
                                    </div>

                                    <div class="relative">
                                        <label for="lastname_titular" class="font-gotham_book text-sm text-white">Apellidos del titular</label>
                                        <input x-model="lastname_titular" @input="errorsStep2.lastname_titular = false" type="text" name="lastname_titular" id="lastname_titular" placeholder="" 
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                        <span x-show="errorsStep2.lastname_titular" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                            Por favor ingrese los apellidos
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="md:col-span-2 hidden" id="juridicaFields">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div class="relative">
                                        <label for="ruc" class="text-white text-sm">RUC</label>
                                        <input x-model="ruc" @input="errorsStep2.RUC = false" type="text" id="ruc" name="ruc"
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                                        <span x-show="errorsStep2.ruc" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                            Por favor ingrese el RUC
                                        </span>
                                    </div>
                                    <div class="relative">
                                        <label for="name_business" class="text-white text-sm">Razón Social</label>
                                        <input x-model="name_business" @input="errorsStep2.name_business = false" type="text" id="name_business" name="name_business"
                                            class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                                        <span x-show="errorsStep2.name_business" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                            Por favor ingrese la razón social
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_dep" class="font-gotham_book text-sm text-white">Departamento de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select x-model="address_dep" name="address_dep" id="address_dep" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5"
                                        x-init="
                                            $nextTick(() => {
                                                $('#address_dep').select2().on('change', function () {
                                                    address_dep = this.value;
                                                    errorsStep2.address_dep = (address_dep === '');
                                                });
                                            });
                                        "
                                        >
                                        <option value="" disabled selected >Seleccione</option>
                                        @foreach ($departamentofiltro as $item)
                                            <option data-cod="{{$item->id}}" value="{{ $item->description }}">{{ $item->description }}</option>
                                        @endforeach
                                    </select>
                                    <span x-show="errorsStep2.address_dep" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                        Por favor seleccione el departamento
                                    </span>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_prov" class="font-gotham_book text-sm text-white">Provincia de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select x-model="address_prov" name="address_prov" id="address_prov" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5"
                                        x-init="
                                            $nextTick(() => {
                                                $('#address_prov').select2().on('change', function () {
                                                    address_prov = this.value;
                                                    errorsStep2.address_prov = (address_prov === '');
                                                });
                                            });
                                        "
                                        >
                                        <option value="" disabled selected >Seleccione</option>
                                    </select>
                                    <span x-show="errorsStep2.address_prov" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                        Por favor seleccione la provincia
                                    </span>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_district" class="font-gotham_book text-sm text-white">Distrito de instalación</label>
                                <div class="flex flex-col mt-1.5">
                                    <select x-model="address_district" name="address_district" id="address_district" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5"
                                        x-init="
                                            $nextTick(() => {
                                                $('#address_district').select2().on('change', function () {
                                                    address_district = this.value;
                                                    errorsStep2.address_district = (address_district === '');
                                                });
                                            });
                                        "
                                        >
                                        <option value="" disabled selected >Seleccione</option>
                                    </select>
                                    <span x-show="errorsStep2.address_district" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                        Por favor seleccione el distrito
                                    </span>
                                </div>
                            </div>


                            <div class="md:col-span-2 relative">
                                <label for="adress_location" class="font-gotham_book text-sm text-white">Dirección de instalación</label>
                                <input x-model="adress_location" @input="errorsStep2.adress_location = false" type="text" id="adress_location" name="adress_location"
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                                <span x-show="errorsStep2.adress_location" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese la dirección de instalación
                                </span>
                            </div>

                            <div class="md:col-span-2 relative">
                                <label for="code_service" class="font-gotham_book text-sm text-white">Código del servicio o del contrato de abonado</label>
                                <input x-model="code_service" @input="errorsStep2.code_service = false" type="text" id="code_service" name="code_service"
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                                <span x-show="errorsStep2.code_service" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese el código del servicio
                                </span>
                            </div>

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos del reclamante / Datos del representante Legal</h2>

                            <div class="relative">
                                <label for="type_document_legal" class="font-gotham_book text-sm text-white">Tipo de Documento de Identidad</label>
                                <div class="flex flex-col mt-1.5">
                                    <select x-model="type_document_legal" name="type_document_legal" id="type_document_legal" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5"
                                        x-init="
                                            $nextTick(() => {
                                                $('#type_document_legal').select2().on('change', function () {
                                                    type_document_legal = this.value;
                                                    errorsStep2.type_document_legal = (type_document_legal === '');
                                                });
                                            });
                                        "
                                        >
                                        <option value="" disabled selected >Seleccione</option>
                                        <option value="CE">Carné de extranjería (CE)</option>
                                        <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                                        <option value="RUC">Registro Único de Contribuyentes (RUC)</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                    </select>
                                    <span x-show="errorsStep2.type_document_legal" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                        Por favor seleccione un documento
                                    </span>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="doc_number_legal" class="font-gotham_book text-sm text-white">N° del documento de Identidad</label>
                                <input x-model="doc_number_legal" @input="errorsStep2.doc_number_legal = false" type="text" id="doc_number_legal" name="doc_number_legal"
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60" />
                                <span x-show="errorsStep2.doc_number_legal" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese nro de documento
                                </span>
                            </div>

                            <div class="relative">
                                <label for="name_legal" class="font-gotham_book text-sm text-white">Nombres del reclamante/representante legal</label>
                                <input x-model="name_legal" @input="errorsStep2.name_legal = false" type="text" name="name_legal" id="name_legal" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errorsStep2.name_legal" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese nombre del reclamante
                                </span>
                            </div>

                            <div class="relative">
                                <label for="lastname_legal" class="font-gotham_book text-sm text-white">Apellidos del reclamante/representante legal</label>
                                <input x-model="lastname_legal" @input="errorsStep2.lastname_legal = false" type="text" name="lastname_legal" id="lastname_legal" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errorsStep2.lastname_legal" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese apellidos del reclamante
                                </span>
                            </div>

                            <div class="relative">
                                <label for="address_email" class="font-gotham_book text-sm text-white">Dirección de correo electrónico</label>
                                <input x-model="address_email" @input="errorsStep2.address_email = false" type="email" name="address_email" id="address_email" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errorsStep2.address_email" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese correo electrónico
                                </span>
                            </div>

                            <div class="relative">
                                <label for="phone_mobile" class="font-gotham_book text-sm text-white">Contacto de referencia (móvil o fijo)</label>
                                <input x-model="phone_mobile" @input="errorsStep2.phone_mobile = false" type="text" name="phone_mobile" id="phone_mobile" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errorsStep2.phone_mobile" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese movil o fijo
                                </span>
                            </div>

                            <div class="md:col-span-2 relative flex flex-row justify-between gap-10">
                                <p class="font-gotham_book text-sm text-white w-full">Se adjunta carta poder simple con la firma del usuario u otro documento que acredite la representación</p>
                                
                                <div class="flex justify-content-center w-25 font-gotham_light font-semibold text-sm text-white">
                                    <label class="mr-4 flex flex-row items-center">
                                        Si <input x-model="doc_archive" @change="errorsStep2.doc_archive = false;" class="text-medium ml-2" type="radio" name="doc_archive" value="1">
                                    </label>
                                    <label class="flex flex-row items-center">
                                        No <input x-model="doc_archive" @change="errorsStep2.doc_archive = false;" class="text-medium ml-2" type="radio" name="doc_archive" value="0">
                                    </label>
                                </div>
                                <span x-show="errorsStep2.doc_archive" class="text-red-300 text-xs 2xl:text-base mt-3 block font-gotham_book absolute -bottom-5 left-0">
                                    Por favor seleccione una opción
                                </span>
                            </div>

                            <div  class="relative md:col-span-2 hidden" id="archiveContainer">
                                <label for="archive" class="font-gotham_book text-sm text-white">Adjuntar poder</label>
                                <input type="file" name="archive" id="archive" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos para la notificación</h2>

                            <div class="md:col-span-2 relative flex flex-row justify-between gap-10">
                                <p class="font-gotham_book text-sm text-white w-full">Autorizo ser notificado por el correo electrónico registrado</p>
                                
                                <div class="flex justify-content-center w-25 font-gotham_light font-semibold text-sm text-white">
                                    <label class="mr-4 flex flex-row items-center">
                                        Si <input x-model="notification" @change="errorsStep2.notification = false;" class="text-medium ml-2" type="radio" name="notification" value="1">
                                    </label>
                                    <label class="flex flex-row items-center">
                                        No <input x-model="notification" @change="errorsStep2.notification = false;" class="text-medium ml-2" type="radio" name="notification" value="0">
                                    </label>
                                </div>
                                <span x-show="errorsStep2.notification" class="text-red-300 text-xs 2xl:text-base mt-3 block font-gotham_book absolute -bottom-5 left-0">
                                    Por favor seleccione una opción
                                </span>
                            </div>

                            <div class="relative md:col-span-2">
                                <label for="address_email_noti" class="font-gotham_book text-sm text-white">Dirección de correo electrónico</label>
                                <input type="email" name="address_email_noti" id="address_email_noti" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="relative">
                                <label for="address_dep_noti" class="font-gotham_book text-sm text-white">Departamento</label>
                                <div class="flex flex-col mt-1.5">
                                    <select name="address_dep_noti" id="address_dep_noti" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        @foreach ($departamentofiltro as $item)
                                            <option data-cod="{{$item->id}}" value="{{ $item->description }}">{{ $item->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_prov_noti" class="font-gotham_book text-sm text-white">Provincia</label>
                                <div class="flex flex-col mt-1.5">
                                    <select name="address_prov_noti" id="address_prov_noti" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="relative">
                                <label for="address_district_noti" class="font-gotham_book text-sm text-white">Distrito</label>
                                <div class="flex flex-col mt-1.5">
                                    <select name="address_district_noti" id="address_district_noti" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5">
                                        <option value="" disabled selected >Seleccione</option>
                                        
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

                            <h2 class="md:col-span-2 text-white font-gotham_book font-semibold text-lg">Datos de la queja</h2>

                            <div class="relative md:col-span-2">
                                <label for="claim_number" class="font-gotham_book text-sm text-white">Codigo o N° de reclamo</label>
                                <input x-model="claim_number" @input="errorsStep2.claim_number = false" type="text" name="claim_number" id="claim_number" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                                <span x-show="errorsStep2.claim_number" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese el código o número de reclamo
                                </span>
                            </div>

                            <div class="md:col-span-2 relative">
                                <label for="claim_issue" class="font-gotham_book text-sm text-white">Motivo de queja</label>
                                <div class="flex flex-col mt-1.5">
                                    <select  x-model="claim_issue" name="claim_issue" id="claim_issue" placeholder="Seleccione" 
                                        class="customselect min-w-[300px] font-gotham_book w-full mt-1.5"
                                        x-init="
                                            $nextTick(() => {
                                                $('#claim_issue').select2().on('change', function () {
                                                    claim_issue = this.value;
                                                    errorsStep2.claim_issue = (claim_issue === '');
                                                });
                                            });
                                        "
                                        >
                                        <option value="" disabled selected >Seleccione una opción</option>
                                        <option value="Otros defectos de tramitación">Otros defectos de tramitación</option>
                                        <option value="Falta de respuesta al reclamo (aplicación de silencio administrativo positivo)">Falta de respuesta al reclamo (aplicación de silencio administrativo positivo)</option>
                                        <option value="No se permitió la presentación de reclamo, recurso de apelación o queja o no se otorgó el código respectivo">No se permitió la presentación de reclamo, recurso de apelación o queja o no se otorgó el código respectivo</option>
                                        <option value="Suspensión del servicio pese a reclamo en trámite">Suspensión del servicio pese a reclamo en trámite</option>
                                        <option value="Requerimiento de pago del monto reclamado">Requerimiento de pago del monto reclamado</option>
                                        <option value="No se permitió el pago a cuenta del monto no reclamado">No se permitió el pago a cuenta del monto no reclamado</option>
                                    </select>
                                    <span x-show="errorsStep2.claim_issue" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                        Por favor seleccione el motivo de queja
                                    </span>
                                </div>
                            </div>

                            <div class="relative md:col-span-2">
                                <label for="claim" class="font-gotham_book text-sm text-white">Detalle del inconveniente (máximo 5000 caracteres)</label>
                                <textarea x-model="claim" @input="errorsStep2.claim = false" rows="4" name="claim" id="claim" placeholder="Indicanos cual es su malestar/inconveniente" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60"></textarea>
                                <span x-show="errorsStep2.claim" class="text-red-300 text-xs 2xl:text-base mt-1 block font-gotham_book">
                                    Por favor ingrese detalle de inconveniente
                                </span>
                            </div>

                            <div class="md:col-span-2 relative flex flex-row justify-between gap-10">
                                <p class="font-gotham_book text-sm text-white w-full">¿Se adjunta información adicional?</p>
                                
                                <div class="flex justify-content-center w-25 font-gotham_light font-semibold text-sm text-white">
                                    <label class="mr-4 flex flex-row items-center">
                                        Si <input x-model="doc_aditional" @change="errorsStep2.doc_aditional = false;" class="text-medium ml-2" type="radio" name="doc_aditional" value="1">
                                    </label>
                                    <label class="flex flex-row items-center">
                                        No <input x-model="doc_aditional" @change="errorsStep2.doc_aditional = false;" class="text-medium ml-2" type="radio" name="doc_aditional" value="0">
                                    </label>
                                </div>
                                <span x-show="errorsStep2.doc_aditional" class="text-red-300 text-xs 2xl:text-base mt-3 block font-gotham_book absolute -bottom-5 left-0">
                                    Por favor seleccione una opción
                                </span>
                            </div>

                            <div class="relative md:col-span-2 hidden" id="archiveContainersecond">
                                <label for="archive_aditional" class="font-gotham_book text-sm text-white">Adjuntar poder</label>
                                <input type="file" name="archive_aditional" id="archive_aditional" placeholder="" 
                                    class="mt-1.5 p-2 rounded bg-white bg-opacity-10 text-white font-gotham_book w-full focus:border-white focus:ring-0 placeholder:text-white placeholder:text-opacity-60">
                            </div>

                            <div class="md:col-span-2 flex flex-row px-4 py-5 bg-[#D1ECF1] items-start justify-start gap-3">
                                <i class="fa fa-at fa-2x mr-2  text-[#0c5460]" aria-hidden="true"></i> 
                                <div class="text-sm 2xl:text-lg text-[#0c5460] font-gotham_book font-semibold">
                                    {!!$atencion->reclamo_footer ?? 'Ingrese la descripcion' !!}
                                </div>   
                            </div>


                            
                            <div class="md:col-span-2 flex justify-between">
                                <button type="button" @click="paso = 1" class="md:col-span-2 bg-[#9b9692] text-white text-lg font-gotham_medium px-12 py-2 rounded mx-auto mt-3">
                                    Atrás
                                </button>
                                <button type="submit" @click="if(!validateStep2()) { return false }" class="md:col-span-2 bg-[#E29720] text-white text-lg font-gotham_medium px-12 py-2 rounded mx-auto mt-3">
                                    Enviar
                                </button>
                            </div>

                        </div>
                        
                        <p class="md:col-span-2 text-center text-white font-gotham_book text-sm py-6">Al hacer clic en CONTINUAR aceptas haber leído nuestra <a class="cursor-pointer" id="linkPoliticas_second"><span class="text-[#E29720]"> política de privacidad.</span></a></p>
                            
                        <div class="flex flex-col justify-start gap-3 p-4 w-full md:col-span-2 border border-white font-gotham_light text-white">
                            {!!$atencion->reclamo_two ?? 'Ingrese la descripcion' !!}
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
            const radios = document.querySelectorAll('input[name="doc_archive"]');
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
                                title: 'Queja enviada!',
                                html: `Tu queja ha sido registrada correctamente.<br><br>
                                    <strong>Número de queja:</strong> ${response.complaint_number}.<br><br>
                                    `,
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                // Redirigir a página de éxito o recargar
                                window.location.href = '/queja-exitoso?numero=' + response.complaint_number;
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
    <script>
        $(document).ready(function() {
            // Inicializa Select2
            $('#address_dep').on('change', function() {
                var departmentId = $('#address_dep option:selected').data('cod'); // ← Usa data-cod
    
                if (departmentId) {
                    $.ajax({
                        url: '/obtenerProvincia/' + departmentId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#address_prov').prop('disabled', false).empty().append(
                                '<option value="">Selecciona una provincia</option>');
                            $.each(data, function(key, value) {
                                $('#address_prov').append('<option data-cod="' + value.id + '" value="' + value.description + '">' + value.description + '</option>');
                            });
                            $('#address_prov').val('').trigger('change'); // ← limpia y reinicia Select2
                            $('#address_district').prop('disabled', true).empty().append(
                                '<option value="">Selecciona un distrito</option>');
                            $('#address_district').val('').trigger('change');
                        }
                    });
                } else {
                    $('#address_prov').prop('disabled', true).empty().append('<option value="">Selecciona una provincia</option>');
                    $('#address_district').prop('disabled', true).empty().append('<option value="">Selecciona un distrito</option>');
                    $('#address_prov, #address_district').val('').trigger('change');
                }
            });
    
            $('#address_prov').on('change', function() {
                var provinceId = $('#address_prov option:selected').data('cod');
    
                if (provinceId) {
                    $.ajax({
                        url: '/obtenerDistritos/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#address_district').prop('disabled', false).empty().append(
                                '<option value="">Selecciona un distrito</option>');
                            $.each(data, function(key, value) {
                                $('#address_district').append('<option value="' + value.description + '">' + value.description + '</option>');
                            });
                            $('#address_district').val('').trigger('change');
                        }
                    });
                } else {
                    $('#address_district').prop('disabled', true).empty().append('<option value="">Selecciona un distrito</option>');
                    $('#address_district').val('').trigger('change');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inicializa Select2
            $('#address_dep_noti').on('change', function() {
                var departmentId = $('#address_dep_noti option:selected').data('cod'); // ← Usa data-cod
    
                if (departmentId) {
                    $.ajax({
                        url: '/obtenerProvincia/' + departmentId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#address_prov_noti').prop('disabled', false).empty().append(
                                '<option value="">Selecciona una provincia</option>');
                            $.each(data, function(key, value) {
                                $('#address_prov_noti').append('<option data-cod="' + value.id + '" value="' + value.description + '">' + value.description + '</option>');
                            });
                            $('#address_prov_noti').val('').trigger('change'); // ← limpia y reinicia Select2
                            $('#address_district_noti').prop('disabled', true).empty().append(
                                '<option value="">Selecciona un distrito</option>');
                            $('#address_district_noti').val('').trigger('change');
                        }
                    });
                } else {
                    $('#address_prov_noti').prop('disabled', true).empty().append('<option value="">Selecciona una provincia</option>');
                    $('#address_district_noti').prop('disabled', true).empty().append('<option value="">Selecciona un distrito</option>');
                    $('#address_prov_noti, #address_district_noti').val('').trigger('change');
                }
            });
    
            $('#address_prov_noti').on('change', function() {
                var provinceId = $('#address_prov_noti option:selected').data('cod');
    
                if (provinceId) {
                    $.ajax({
                        url: '/obtenerDistritos/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#address_district_noti').prop('disabled', false).empty().append(
                                '<option value="">Selecciona un distrito</option>');
                            $.each(data, function(key, value) {
                                $('#address_district_noti').append('<option value="' + value.description + '">' + value.description + '</option>');
                            });
                            $('#address_district_noti').val('').trigger('change');
                        }
                    });
                } else {
                    $('#address_district_noti').prop('disabled', true).empty().append('<option value="">Selecciona un distrito</option>');
                    $('#address_district_noti').val('').trigger('change');
                }
            });
        });
    </script>
@stop

@stop
