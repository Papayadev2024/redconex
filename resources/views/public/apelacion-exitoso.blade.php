@extends('components.public.matrix')

@section('css_importados')

@stop


@section('content')

    <section  class="bg-cover bg-center pt-16"  style="background-image:url({{asset('images/img/texturanosotros.png')}})">
                
        <section class="flex flex-col justify-start items-center px-[5%] xl:px-[8%] py-10 lg:py-0 relative">
            <div class="flex flex-col gap-1 max-w-xl text-center mx-auto">
                <h2 class="font-gotham_bold text-white text-3xl" data-aos="fade-down">
                    COMPLETE EL FORMULARIO
                </h2>
            </div>
        </section>

        <section class="flex flex-col justify-start gap-3 items-start px-[5%] py-10 lg:py-12 relative max-w-4xl mx-auto">
            <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Hola, {{ $claim->name_legal ?? 'Usuario' }} Tu apelacion se ha enviado con éxito.</h2>
            <p class="text-white font-gotham_light text-base 2xl:text-lg">Acá te dejamos el código de tu solicitud: <span class="text-lg font-semibold">{{ $claim->appeal_number ?? ''}}</span> para que puedas consultar el estado de tu caso al llamar a cualquiera de nuestras líneas de atención al cliente.</p>
            <p class="text-white font-gotham_light text-base 2xl:text-lg"><i class="fa-solid fa-phone"></i> <span class="font-semibold">{{ $general->cellphone }}</span> </p>
        </section>

        <section class="flex flex-col justify-start items-center px-[5%] xl:px-[8%] py-10 lg:py-0 relative">
            <div class="flex flex-col gap-1 max-w-xl text-center mx-auto">
                <h2 class="font-gotham_bold text-white text-3xl" data-aos="fade-down">
                    RESUMEN DE APELACION
                </h2>
            </div>
        </section>

        <section class="flex flex-col justify-start gap-3 items-start px-[5%] py-10 lg:py-12 relative max-w-4xl mx-auto">
           
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Fecha y hora de registro:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->created_at->format('d/m/Y H:i') ?? '' }}</p>
            </div> 
            
            <!-- 1. DATOS GENERALES -->
            <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">1. DATOS GENERALES</h2>
        
            <!-- Tipo de servicio -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Tipo de servicio:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->project ?? ''}}</p>
            </div>
            
            <!-- Nombre del titular/Razón Social -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Nombre del titular / Razón Social:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">
                    @if($claim->role == 'Persona natural')
                        {{ $claim->name_titular ?? ''}} {{ $claim->lastname_titular ?? ''}}
                    @else
                        {{ $claim->name_business ?? ''}}
                    @endif
                </p>
            </div>
            
            <!-- DNI/RUC -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">
                    @if($claim->role == 'Persona natural') DNI: @else RUC: @endif
                </h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">
                    @if($claim->role == 'Persona natural')
                        {{ $claim->doc_number ?? ''}}
                    @else
                        {{ $claim->ruc ?? ''}}
                    @endif
                </p>
            </div>
            
            <!-- Dirección -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Dirección:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">
                    {{ $claim->adress_location ?? '' }}, 
                    {{ $claim->address_district ?? ''}}, 
                    {{ $claim->address_prov ?? ''}}, 
                    {{ $claim->address_dep ?? ''}}
                </p>
            </div>
            
            <!-- Correo electrónico -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Dirección de correo electrónico:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->address_email ?? ''}}</p>
            </div>
            
            <!-- Contacto de referencia -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Contacto de referencia (móvil o fijo):</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->phone_mobile ?? ''}}</p>
            </div>
            
            <!-- Reclamante/representante legal -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Nombre del reclamante / representante Legal:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->name_legal ?? ''}} {{ $claim->lastname_legal ?? ''}}</p>
            </div>
            
            <!-- DNI reclamante -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">DNI:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->doc_number_legal ?? ''}}</p>
            </div>
            
            <!-- Tipo -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Tipo:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->type_person ?? ''}}</p>
            </div>
            
            <!-- Notificación por correo -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Autorizo ser notificado por el correo electrónico registrado:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">
                    @if($claim->notification)
                        SI <span class="inline-block w-4 h-4 border border-white ml-2"></span> 
                        No <span class="inline-block w-4 h-4 border border-white bg-white ml-2"></span>
                    @else
                        SI <span class="inline-block w-4 h-4 border border-white bg-white ml-2"></span> 
                        No <span class="inline-block w-4 h-4 border border-white ml-2"></span>
                    @endif
                </p>
            </div>
            
            
            <!-- Datos de notificación -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Dirección correo electrónico:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->address_email_noti ?? '' }}</p>
            </div>
            
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Dirección:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">
                    {{ $claim->address_location_noti ?? '' }}, 
                    {{ $claim->address_district_noti ?? '' }}, 
                    {{ $claim->address_prov_noti ?? '' }}, 
                    {{ $claim->address_dep_noti ?? '' }}
                </p>
            </div>
            
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Referencia:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->address_reference_noti ?? '' }}</p>
            </div>
            
            
            <!-- 2. DATOS DEL RECLAMO -->
            <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg mt-6">2. DATOS DE LA QUEJA</h2>
            
            <!-- Materia de reclamo -->
            <div class="flex flex-row justify-start items-center gap-1">
                <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Materia de queja:</h2>
                <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->claim_issue ?? '' }}</p>
            </div>

            @if($claim->claim_number)
                <div class="flex flex-row justify-start items-center gap-1">
                    <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Codigo de Reclamo:</h2>
                    <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->claim_number }}</p>
                </div>
            @endif

            @if($claim->resolution)
                <div class="flex flex-row justify-start items-center gap-1">
                    <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Resolución N°:</h2>
                    <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->resolution }}</p>
                </div>
            @endif

            @if($claim->claim_issue_second)
                <div class="flex flex-row justify-start items-center gap-1">
                    <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Problema específico:</h2>
                    <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->claim_issue_second }}</p>
                </div>
            @endif
            
            <!-- Detalle del reclamo -->
            @if($claim->claim)
                <div class="w-full mt-3">
                    <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg mb-2">Detalle:</h2>
                    <p class="text-white font-gotham_light text-base 2xl:text-lg">{{ $claim->claim }}</p>
                </div>
            @endif


            @if($claim->amount_claim)
                <div class="flex flex-row justify-start items-center gap-1 mt-3">
                    <h2 class="text-white font-gotham_light font-semibold text-base 2xl:text-lg">Monto reclamado:</h2>
                    <p class="text-white font-gotham_light text-base 2xl:text-lg">S/ {{ number_format($claim->amount_claim, 2) }}</p>
                </div>
            @endif
            
            <!-- Mensaje final -->
            <div class="w-full mt-8 text-center">
                <p class="text-white font-gotham_light text-base 2xl:text-lg mb-4">
                    De todas maneras te atenderemos lo más pronto posible y tendremos en cuenta tus observaciones para mejorar la calidad de nuestros servicios.
                </p>
                <h3 class="text-white font-gotham_bold text-xl 2xl:text-2xl">¡Muchas gracias!</h3>
            </div>
            
        </section>

    </section>

@section('scripts_importados')

@stop

@stop
