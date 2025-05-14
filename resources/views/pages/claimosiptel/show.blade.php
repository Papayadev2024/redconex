<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <div
          class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
          <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl">Reclamo N° {{ $message->claim_number }}</h2>
          </header>
          <div class="p-3">
    
            <div class="p-6">
                <table class="table-auto w-full border-collapse border border-gray-300 mb-8 text-sm">
                    <tr>
                        <td class="font-bold border px-4 py-2">Proyecto:</td>
                        <td class="border px-4 py-2">{{ $message->project ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Fecha de nacimiento:</td>
                        <td class="border px-4 py-2">{{ $message->birthay ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Nombre del padre:</td>
                        <td class="border px-4 py-2">{{ $message->name_dad ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Nombre de la madre:</td>
                        <td class="border px-4 py-2">{{ $message->name_mom ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Lugar de nacimiento:</td>
                        <td class="border px-4 py-2">{{ $message->address_birthay ?? '---' }}</td>
                        <td class="font-bold border px-4 py-2">Tipo de persona:</td>
                        <td class="border px-4 py-2">{{ $message->type_person ?? '---' }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Rol:</td>
                        <td class="border px-4 py-2">{{ $message->role ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Tipo de documento:</td>
                        <td class="border px-4 py-2">{{ $message->type_document ?? '---' }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Nro. Documento:</td>
                        <td class="border px-4 py-2">{{ $message->doc_number ?? '---' }}</td>
                        <td class="font-bold border px-4 py-2">Nombre titular:</td>
                        <td class="border px-4 py-2">{{ $message->name_titular ?? '---' }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Apellido titular:</td>
                        <td class="border px-4 py-2">{{ $message->lastname_titular ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">RUC:</td>
                        <td class="border px-4 py-2">{{ $message->ruc ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Razón social:</td>
                        <td class="border px-4 py-2">{{ $message->name_business ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Departamento (instalación):</td>
                        <td class="border px-4 py-2">{{ $message->address_dep ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Provincia (instalación):</td>
                        <td class="border px-4 py-2">{{ $message->address_prov ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Distrito (instalación):</td>
                        <td class="border px-4 py-2">{{ $message->address_district ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Dirección detallada:</td>
                        <td class="border px-4 py-2">{{ $message->adress_location ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Código del servicio:</td>
                        <td class="border px-4 py-2">{{ $message->code_service ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Tipo doc. representante legal:</td>
                        <td class="border px-4 py-2">{{ $message->type_document_legal ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Nro. doc. representante legal:</td>
                        <td class="border px-4 py-2">{{ $message->doc_number_legal ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Nombre representante legal:</td>
                        <td class="border px-4 py-2">{{ $message->name_legal ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Apellido representante legal:</td>
                        <td class="border px-4 py-2">{{ $message->lastname_legal ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Correo de contacto:</td>
                        <td class="border px-4 py-2">{{ $message->address_email ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Teléfono móvil:</td>
                        <td class="border px-4 py-2">{{ $message->phone_mobile ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">¿Documento adjunto?:</td>
                        <td class="border px-4 py-2">{{ $message->doc_archive ? 'Sí' : 'No' }}</td>
                        <td class="font-bold border px-4 py-2">Archivo:</td>
                        <td class="border px-4 py-2">
                            @if ($message->doc_archive)
                                <a href="{{ asset($message->archive_path) }}" download class="text-blue-500 underline" target="_blank">Descargar archivo</a>
                            @else
                                No adjunto
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">¿Desea notificación?:</td>
                        <td class="border px-4 py-2">{{ $message->notification ? 'Sí' : 'No' }}</td>
                        <td class="font-bold border px-4 py-2">Correo notificación:</td>
                        <td class="border px-4 py-2">{{ $message->address_email_noti ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Departamento (notificación):</td>
                        <td class="border px-4 py-2">{{ $message->address_dep_noti ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Provincia (notificación):</td>
                        <td class="border px-4 py-2">{{ $message->address_prov_noti ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Distrito (notificación):</td>
                        <td class="border px-4 py-2">{{ $message->address_district_noti ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Dirección (notificación):</td>
                        <td class="border px-4 py-2">{{ $message->address_location_noti ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Referencia (notificación):</td>
                        <td class="border px-4 py-2" colspan="3">{{ $message->address_reference_noti ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Motivo del reclamo:</td>
                        <td class="border px-4 py-2">{{ $message->claim_issue ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Detalle adicional:</td>
                        <td class="border px-4 py-2">{{ $message->claim_issue_second ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Monto reclamado:</td>
                        <td class="border px-4 py-2">{{ $message->amount_claim ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Número de recibo:</td>
                        <td class="border px-4 py-2">{{ $message->number_recibe ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Fecha emisión:</td>
                        <td class="border px-4 py-2">{{ $message->date_emision ?? '---'}}</td>
                        <td class="font-bold border px-4 py-2">Fecha fin:</td>
                        <td class="border px-4 py-2">{{ $message->date_finish ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">Descripción del reclamo:</td>
                        <td class="border px-4 py-2" colspan="3">{{ $message->claim ?? '---'}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold border px-4 py-2">¿Documento adicional?:</td>
                        <td class="border px-4 py-2">{{ $message->doc_aditional ? 'Sí' : 'No' }}</td>
                        <td class="font-bold border px-4 py-2">Archivo adicional:</td>
                        <td class="border px-4 py-2">
                            @if ($message->doc_aditional)
                                <a href="{{ asset($message->archive_aditional_path) }}" download class="text-blue-500 underline" target="_blank">Descargar archivo</a>
                            @else
                                No adjunto
                            @endif
                        </td>
                    </tr>
                </table>
                
    
              <a href="{{ route('reclamos.index') }}" class="bg-blue-500 px-4 py-2 rounded text-white "><span><i
                    class="fa-solid fa-arrow-left mr-2"></i></span> Volver</a>
    
            </div>
          </div>
        </div>
    
      </div>

    

</x-app-layout>
