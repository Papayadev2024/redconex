<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{ route('contactoview.update', $homeview->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Textos -
                        Contacto</h2>
                </header>
                @if (session('success'))
                    <script>
                        window.onload = function() {
                            mostrarAlerta();
                        }
                    </script>
                @endif
                <div class="p-3">

                    <div>

                        <div class="flex items-center justify-center">

                            <div class="rounded shadow-lg p-4 px-4 w-full">

                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 ">
                                    
                                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">Portada</h2>
                                    
                                    <div class="md:col-span-5">
                                        <label for="subtitle1section">Sub Titulo</label>
                                        <div class="relative mb-2 ">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="w-6 text-gray-500 fas fa-edit"></i>
                                            </div>
                                            <input type="text" id="subtitle1section" name="subtitle1section"
                                                value="{{ $homeview->subtitle1section }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese el titulo">
                                        </div>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="title1section">Titulo - Color blanco</label>
                                        <div class="relative mb-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="w-6 text-gray-500 fas fa-edit"></i>
                                            </div>
                                            <input type="text" id="title1section" name="title1section"
                                                value="{{ $homeview->title1section }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese texto">
                                        </div>
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="title1section2">Titulo - Color amarillo</label>
                                        <div class="relative mb-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="w-6 text-gray-500 fas fa-edit"></i>
                                            </div>
                                            <input type="text" id="title1section2" name="title1section2"
                                                value="{{ $homeview->title1section2 }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese texto">
                                        </div>
                                    </div>

                                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">Seccion - Datos de contacto</h2>

                                    <div class="md:col-span-5">
                                        <label for="title2section">Titulo</label>
                                        <div class="relative mb-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="w-6 text-gray-500 fas fa-edit"></i>
                                            </div>
                                            <input type="text" id="title2section" name="title2section"
                                                value="{{ $homeview->title2section }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese texto">
                                        </div>
                                    </div>
                                    
                                    <div class="md:col-span-5">
                                        <label for="description2section">Descripcion</label>
                                        <div class="relative mb-2">
                                            <div
                                                class="absolute top-3 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="w-6 text-gray-500 fas fa-edit"></i>
                                            </div>
                                            <textarea type="text" id="description2section" name="description2section"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese la descripcion">{{ $homeview->description2section }}</textarea>
                                        </div>
                                    </div>

                                
                                    <h2 class="md:col-span-5 font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">Seccion - Preguntas Frecuentes</h2>


                                    <div class="md:col-span-2">
                                        <label for="title3section">Titulo - Color blanco</label>
                                        <div class="relative mb-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="w-6 text-gray-500 fas fa-edit"></i>
                                            </div>
                                            <input type="text" id="title3section" name="title3section"
                                                value="{{ $homeview->title3section }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese texto">
                                        </div>
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="title3section2">Titulo - Color azul</label>
                                        <div class="relative mb-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <i class="w-6 text-gray-500 fas fa-edit"></i>
                                            </div>
                                            <input type="text" id="title3section2" name="title3section2"
                                                value="{{ $homeview->title3section2 }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese texto">
                                        </div>
                                    </div>
                                  

                                    <div class="md:col-span-5 text-right mt-6">
                                        <div class="inline-flex items-end">
                                            <button type="submit" id="form_general"
                                                onclick="confirmarActualizacion()"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Actualizar
                                                datos</button>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        $('document').ready(function() {

            // Función para mostrar la alerta de confirmación antes de enviar el formulario
            function confirmarActualizacion() {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción actualizará los datos.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, actualizar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envía el formulario si se confirma la acción
                        document.getElementById('form_general').submit();
                    }
                });
            }


            function mostrarAlerta() {
                Swal.fire({
                    title: '¡Actualizado!',
                    text: 'Los datos se han actualizado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                });
            }


        });
    </script>


</x-app-layout>
