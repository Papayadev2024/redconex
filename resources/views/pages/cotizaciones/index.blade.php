<x-app-layout title="Cotizaciones">
  <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

    <div
      class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
      <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Cotizaciones</h2>
      </header>
      <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">

          <table id="tabladatos" class="display text-lg" style="width:100%">
            <thead>
              <tr>
                <th>Plan</th>
                <th>Caracteristica</th>
                <th>Numero</th>
                <th>Documento (DNI/RUC/CEX)</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($cotizacion as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->extract }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->number_document }}</td>
                  <td>{{ $item->created_at }}</td>
                  {{-- <td>
                    <form action=" " method="POST">
                      @csrf
                      <a data-idService='{{ $item->id }}' class="btn_delete bg-red-600 p-2 rounded text-white"><i
                          class="fa-regular fa-trash-can "></i></a>
                      
                    </form>
                  </td> --}}

                </tr>
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th>Plan</th>
                <th>Caracteristica</th>
                <th>Numero</th>
                <th>Documento (DNI/RUC/CEX)</th>
                <th>Fecha</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>
    </div>

  </div>

  <script>
    $('document').ready(function() {
      new DataTable('#tabladatos', {

        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        layout: {
          topStart: 'buttons'
        },
        language: {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",
          "sProcessing": "Procesando...",
        },
        buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
          },
          {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
          },
          {
            extend: 'csvHtml5',
            text: '<i class="fas fa-file-csv"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
          },
          {
            extend: 'print',
            text: '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
          },
          {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i> ',
            titleAttr: 'Copiar',
            className: 'btn btn-success',
          },
        ]
      });

      
    })
  </script>

</x-app-layout>
