<x-app-layout title="Editar Servicio">
    @section('css')
        <link rel="stylesheet" href="{{ asset('/css/vendor/dropzone.min.css') }}" />
    @endsection

    @section('js_vendor')
        <script src="{{ asset('/js/cs/scrollspy.js') }}"></script>
        <script src="{{ asset('/js/vendor/dropzone.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/singleimageupload.js') }}"></script>
    @endsection

    @section('js_page')
        <script src="{{ asset('/js/cs/dropzone.templates.js') }}"></script>
        <script src="{{ asset('/js/forms/controls.dropzone.js') }}"></script>
    @endsection
    <style>
        .dropzone {
            min-height: 90px;
            border: 1px solid rgb(209 213 219 / 1) !important;
            background: var(--foreground) !important;
            padding: 14px !important;
            border-radius: 20px !important;
            color: var(--body) !important;
            height: auto;
            /* padding-right: initial !important;
    padding-bottom: initial !important; */
        }

        .dropzone .img-thumbnail {
            height: 58px;
            width: 100% !important;
            -o-object-fit: cover !important;
            object-fit: cover !important;
            padding: initial;
            width: 100%;
            height: 100%;
            filter: initial !important;
            transform: initial !important;
            border-radius: 20px;
            border-top-right-radius: initial;
            border-bottom-right-radius: initial;
            background-color: unset !important;
        }

        .dropzone .image-container {
            width: 30%;
        }

        .dropzone:hover .dz-message {
            color: var(--primary) !important;
        }

        .dropzone.dz-clickable .dz-message {
            position: absolute;
            margin: 0 auto;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--body);
        }

        .dropzone.dz-clickable .dz-message span {
            top: 50px !important;
        }

        .dropzone .dz-preview.dz-image-preview,
        .dropzone .dz-preview.dz-file-preview {
            max-width: 100%;
            min-height: unset;
            border: 1px solid rgb(209 213 219 / 1) !important;
            border-radius: 20px !important;
            background: var(--foreground) !important;
            color: var(--body) !important;
            margin: 1.75rem;
            margin-left: initial !important;
            margin-top: initial !important;
        }

        .dropzone .dz-preview.dz-image-preview>div,
        .dropzone .dz-preview.dz-file-preview>div {
            position: relative;
        }

        .dropzone .dz-preview.dz-image-preview .dz-image,
        .dropzone .dz-preview.dz-file-preview .dz-image {
            height: 100%;
            width: 80px;
            float: left;
            border-radius: initial;
        }

        .dropzone .dz-preview.dz-image-preview .dz-image img,
        .dropzone .dz-preview.dz-file-preview .dz-image img {
            width: 100%;
        }

        .dropzone .dz-preview.dz-image-preview .preview-container,
        .dropzone .dz-preview.dz-file-preview .preview-container {
            transition: initial !important;
            -webkit-animation: initial !important;
            animation: initial !important;
            margin-left: 0;
            margin-top: 0;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .dropzone .dz-preview.dz-image-preview .preview-container i,
        .dropzone .dz-preview.dz-file-preview .preview-container i {
            color: var(--primary);
            font-size: 20px;
            position: absolute;
            left: 50%;
            top: 29px;
            transform: translateX(-50%) translateY(-50%) !important;
            height: 22px;
        }

        .dropzone .dz-preview.dz-image-preview strong,
        .dropzone .dz-preview.dz-file-preview strong {
            font-weight: normal;
        }

        .dropzone .dz-preview.dz-image-preview .remove,
        .dropzone .dz-preview.dz-file-preview .remove {
            position: absolute;
            right: 8px;
            top: 8px;
            color: var(--muted) !important;
        }

        .dropzone .dz-preview.dz-image-preview .remove i,
        .dropzone .dz-preview.dz-file-preview .remove i {
            cursor: pointer;
        }

        .dropzone .dz-preview.dz-image-preview .remove:hover,
        .dropzone .dz-preview.dz-file-preview .remove:hover {
            color: var(--primary) !important;
        }

        .dropzone .dz-preview.dz-image-preview .dz-details,
        .dropzone .dz-preview.dz-file-preview .dz-details {
            position: static;
            display: block;
            opacity: 1;
            text-align: left;
            min-width: unset;
            z-index: initial;

            float: left;
            padding: 0.75rem 1rem;
            width: 75%;
        }

        .dropzone .dz-preview.dz-image-preview .dz-details .dz-size,
        .dropzone .dz-preview.dz-file-preview .dz-details .dz-size {
            margin-bottom: 0;
            font-size: 1em;
        }

        .dropzone .dz-preview.dz-image-preview .dz-details .dz-filename span,
        .dropzone .dz-preview.dz-file-preview .dz-details .dz-filename span {
            border: initial !important;
            background: transparent !important;
        }

        .dropzone .dz-preview.dz-image-preview .dz-error-mark,
        .dropzone .dz-preview.dz-image-preview .dz-success-mark,
        .dropzone .dz-preview.dz-file-preview .dz-error-mark,
        .dropzone .dz-preview.dz-file-preview .dz-success-mark {
            color: var(--primary) !important;
            margin-left: 0;
            margin-top: 0;
            bottom: initial;
            right: initial;
            top: 13px;
            left: 23px;
            padding: 7px 8px;
            background: var(--foreground);
            border-radius: var(--border-radius-xl);
            line-height: 1;
        }

        .dropzone .dz-preview.dz-image-preview .dz-error-mark i,
        .dropzone .dz-preview.dz-image-preview .dz-success-mark i,
        .dropzone .dz-preview.dz-file-preview .dz-error-mark i,
        .dropzone .dz-preview.dz-file-preview .dz-success-mark i {
            font-size: 18px !important;
            color: var(--primary) !important;
        }

        .dropzone .dz-preview.dz-image-preview .dz-error-mark i,
        .dropzone .dz-preview.dz-file-preview .dz-error-mark i {
            color: var(--primary) !important;
        }

        .dropzone .dz-preview.dz-image-preview .dz-progress,
        .dropzone .dz-preview.dz-file-preview .dz-progress {
            width: 100%;
            margin-left: 0;
            margin-top: 0;
            right: 0;
            height: 2px !important;
            left: 15px;
            margin-top: 5px;
            position: static;
        }

        .dropzone .dz-preview.dz-image-preview .dz-progress .dz-upload,
        .dropzone .dz-preview.dz-file-preview .dz-progress .dz-upload {
            width: 100%;
            background: rgb(30 168 231) !important;
        }

        .dropzone .dz-preview.dz-image-preview .dz-error-message,
        .dropzone .dz-preview.dz-file-preview .dz-error-message {
            background: var(--foreground) !important;
            border: 1px solid blue;
            top: 60px;
            color: var(--body);
            padding: calc(var(--card-spacing-xs) / 2) var(--card-spacing-xs);
            border-radius: var(--border-radius-md);
            font-size: 0.875em;
            display: block;
        }

        .dropzone .dz-preview.dz-image-preview .dz-error-message:after,
        .dropzone .dz-preview.dz-file-preview .dz-error-message:after {
            border-bottom: 6px solid blue !important;
        }

        .dropzone .dz-preview.dz-image-preview .dz-error-message:before,
        .dropzone .dz-preview.dz-file-preview .dz-error-message:before {
            content: " ";
            position: absolute;
            top: -5px;
            left: 64px;
            z-index: 1;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid var(--foreground) !important;
        }

        .dropzone .dz-preview.dz-image-preview [data-dz-name],
        .dropzone .dz-preview.dz-file-preview [data-dz-name] {
            white-space: nowrap;
            text-overflow: ellipsis;
            width: calc(100% - 35px);
            display: inline-block;
            overflow: hidden;
        }

        .dropzone.dropzone-columns .dz-preview.dz-image-preview,
        .dropzone.dropzone-columns .dz-preview.dz-file-preview {
            margin-top: var(--bs-gutter-y) !important;
            margin-bottom: initial !important;
        }

        .dropzone:not(.dropzone-columns) .dz-preview.dz-image-preview,
        .dropzone:not(.dropzone-columns) .dz-preview.dz-file-preview {
            width: 100%;
        }

        .dropzone .dz-preview.dz-file-preview .img-thumbnail {
            display: none;
        }

        .dropzone .dz-error.dz-preview.dz-file-preview .preview-icon {
            display: none;
        }

        .dropzone .dz-error.dz-preview.dz-file-preview .dz-error-mark,
        .dropzone .dz-error.dz-preview.dz-file-preview .dz-success-mark {
            color: var(--primary) !important;
            right: 8px;
            left: initial;
            top: initial;
            bottom: 3px;
        }

        .dropzone .dz-preview.dz-image-preview .preview-icon {
            display: none;
        }

        .dropzone.dz-drag-hover {
            border-color: rgba(var(--primary-rgb), 1) !important;
        }

        .dropzone.dz-drag-hover .dz-message {
            color: var(--primary) !important;
            opacity: 1;
        }

        .dropzone.dropzone-top-label {
            padding: 2rem 0.5rem 0rem 1rem !important;
            min-height: 103px !important;
        }

        .form-floating .dropzone.dropzone-floating-label {
            padding: 1rem !important;
            min-height: 101px !important;
        }

        .form-floating .dropzone.dropzone-floating-label.dz-started {
            padding-top: 2rem !important;
            padding-bottom: 0 !important;
        }

        .form-floating .dropzone.dropzone-floating-label.dz-started~label {
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
            color: var(--muted);
        }

        .dropzone.dropzone-filled {
            border: 1px solid transparent !important;
            background: var(--background-light) !important;
            padding-left: 45px !important;
        }

        .dropzone.dropzone-filled .dz-message {
            top: initial;
            left: 45px;
            transform: initial;
            color: var(--muted) !important;
            font-weight: 300;
            top: 11px;
        }

        .dropzone.dropzone-filled+i {
            margin-top: 0;
            top: 14px;
        }

        .dropzone.dropzone-filled.dropzone.dz-drag-hover {
            background: var(--foreground) !important;
            border-color: rgba(var(--primary-rgb), 1) !important;
        }

        .dropzone .dz-preview:not(.dz-processing) .dz-progress {
            -webkit-animation: initial;
            animation: initial;
        }

        .dropzone.row {
            min-height: 210px;
        }

        .dropzone.row.border-0 {
            border: initial !important;
        }

        .dropzone.row.p-0 {
            padding: initial !important;
        }

        .dropzone.row .dz-preview.dz-image-preview.col.border-0,
        .dropzone.row .dz-preview.dz-file-preview.col.border-0 {
            border: initial !important;
        }

        .dropzone.row .dz-preview.dz-image-preview .dz-error-mark,
        .dropzone.row .dz-preview.dz-image-preview .dz-success-mark,
        .dropzone.row .dz-preview.dz-file-preview .dz-error-mark,
        .dropzone.row .dz-preview.dz-file-preview .dz-success-mark {
            left: -16px;
            margin-left: 50%;
            top: 20px;
            margin-top: 0;
        }

        .dropzone.row .dz-preview.dz-image-preview .remove,
        .dropzone.row .dz-preview.dz-file-preview .remove {
            bottom: 25px;
            top: initial;
            right: 20px;
            left: initial;
        }

        .dropzone.row .dz-preview.dz-image-preview .dz-error-message,
        .dropzone.row .dz-preview.dz-file-preview .dz-error-message {
            left: 50%;
            right: initial;
            transform: translateX(-50%);
        }
    </style>


    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            id="formularioedit">
            @csrf
            @method('PUT')
            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">

                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">

                        ID: {{ $product->id }} - {{ $product->producto }}
                    </h2>
                </header>
                <div class="flex flex-col gap-2 p-3 ">
                    <div class="flex flex-col md:flex-row  gap-2 p-3 ">
                        <div class="basis-full md:basis-3/5">
                            <div class="rounded shadow-lg p-4 px-4 ">


                                <div id='general' class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 ">

                                    <div class="md:col-span-5 mt-2">

                                        <label for="producto">Orden (El menor número se mostrara en primer lugar)</label>

                                        <div class="relative mb-2  mt-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                            fill="#9F9F9F" opacity="1" data-original="#000000"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="number" id="order" name="order" value="{{$product->order}}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('producto') is-invalid @enderror"
                                                placeholder="Orden">
                                        </div>
                                    </div>

                                    
                                    <div class="col-span-1 md:col-span-5 mt-2">

                                        <label for="producto">Producto <span class="text-red-500"> (Obligatorio)
                                        </span></label>

                                        <div class="relative mb-2  mt-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                            fill="#9F9F9F" opacity="1" data-original="#000000"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="text" id="producto" name="producto"
                                                value="{{ $product->producto }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Producto">
                                        </div>
                                    </div>

                                    

                                    
                                    <div class="md:col-span-5 mt-2">

                                        <label for="extract">Velocidad y Complemento</label>

                                        <div class="relative mb-2  mt-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                            fill="#9F9F9F" opacity="1" data-original="#000000"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="text" id="extract" name="extract"
                                                value="{{ $product->extract }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Ingrese datos">


                                        </div>
                                    </div>


                                    <div class="md:col-span-5">
                                        <label for="description">Descripción</label>
                                        <div class="relative mb-2 mt-2">
                                            {{-- <x-textarea name="description" value="{!! $product->description !!}" /> --}}
                                            <textarea class="ckeditor" id="description" name="description">{!! $product->description !!}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="md:col-span-5">
                                        <label for="especificacion">Caracteristica (De un salto de linea por cada caracteristica)</label>
                                        <div class="relative mb-2 mt-2"> 
                                            {{-- <x-textarea name="especificacion" value="{!! $product->especificacion !!}" /> --}}
                                            <textarea class="ckeditor" id="especificacion" name="especificacion">{!! $product->especificacion !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="imagen">Nueva imagen principal (1000x1000px)</label>
                                        <div class="relative mb-2  mt-2">
                                            <input id="imagen" name="imagen"
                                                class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                        </div>
                                    </div>

                                    <div class="md:col-span-1 ">
                                        <label>Imagen principal </label>
                                        <div
                                            class="h-40 mt-2 py-4 flex flex-row justify-center border items-center border-gray-300 rounded-xl bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                            <img src="{{ asset($product->imagen) }}" alt=""
                                                class="w-24 rounded-xl">
                                        </div>

                                    </div>

                                    {{-- <div class="md:col-span-4 ">
                                        <label>Galería</label>
                                        <div
                                            class="h-40 mt-2 px-2 py-3 flex flex-row justify-center border items-center border-gray-300 rounded-xl bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                            @if (!$product->galeria->isEmpty())
                                                <div class="flex gap-5 ">
                                                    @foreach ($product->galeria as $item)
                                                        <div id="portada-{{ $item->id }}">
                                                            <i onclick="borrarImg({{ $item->id }})"
                                                                class="ml-1 cursor-pointer absolute">
                                                                <svg class="w-6" xmlns="http://www.w3.org/2000/svg"
                                                                    version="1.1"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="36" height="36" x="0" y="0"
                                                                    viewBox="0 0 512 512"
                                                                    style="enable-background:new 0 0 512 512"
                                                                    xml:space="preserve">
                                                                    <g>
                                                                        <g fill="#EF5350">
                                                                            <path
                                                                                d="M412.6 141.4v.1c0 .6-.2.9-.4 1.1s-.6.5-1.2.5h-11.4c-.4-.1-.9-.2-1.4-.2s-.9.1-1.4.2H115.1c-.4-.1-.9-.2-1.4-.2s-.9.1-1.4.2H101c-1 0-1.7-.8-1.7-1.7v-32.1c0-1 .8-1.7 1.7-1.7h310c1 0 1.7.8 1.7 1.7zM393.4 152.7V442c0 13.3-10.8 24.1-24.1 24.1H142.8c-13.3 0-24.1-10.8-24.1-24.1V152.7zM332 396.2V222.7c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v173.4c0 2.7 2.2 4.9 4.9 4.9 2.8 0 4.9-2.1 4.9-4.8zM261 409V209.9c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v199c0 2.7 2.2 4.9 4.9 4.9s4.9-2.1 4.9-4.8zm-71.1-12.8V222.7c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v173.4c0 2.7 2.2 4.9 4.9 4.9s4.8-2.1 4.9-4.8zM321.5 57.3v40.5h-9.7V57.3c0-.9-.7-1.7-1.7-1.7H201.8c-.9 0-1.7.7-1.7 1.7v40.5h-9.8V57.3c0-6.3 5.1-11.4 11.4-11.4H310c6.4 0 11.5 5.1 11.5 11.4z"
                                                                                fill="#EF5350" opacity="1"
                                                                                data-original="#ef5350"></path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </i>
                                                            <img src="{{ asset($item->imagen) }}" alt=""
                                                                class="w-24">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="text-black">No cuenta con imágenes en la galería</div>
                                            @endif
                                        </div>
                                    </div> --}}


                                    {{-- <div class="md:col-span-5 mt-2">

                                        <label for="seotitulo">SEO - Titulo (Nombre de producto por default)</label>

                                        <div class="relative mb-2  mt-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                            fill="#9F9F9F" opacity="1" data-original="#000000"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="text" id="seotitulo" name="meta_title"
                                                value="{{ $product->meta_title }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('extract') is-invalid @enderror"
                                                placeholder="Titulo">
                                        </div>
                                    </div>

                                    <div class="md:col-span-5 mt-2">

                                        <label for="seodescription">SEO - Descripción (Descripción de producto por
                                            default)</label>

                                        <div class="relative mb-2  mt-2">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                            fill="#9F9F9F" opacity="1" data-original="#000000"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="text" id="seodescription" name="meta_description"
                                                value="{{ $product->meta_description }}"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('extract') is-invalid @enderror"
                                                placeholder="Descripción">

                                        </div>
                                    </div>

                                    <div class="md:col-span-5 mt-2">

                                        <label for="keyword">SEO - Keywords (Ingrese las palabras clave por
                                            comas)</label>

                                        <div class="relative mb-2  mt-2">
                                            <div
                                                class="absolute top-2 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                    height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                            fill="#9F9F9F" opacity="1" data-original="#000000"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <textarea id="keyword" name="meta_keywords" value=""
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('extract') is-invalid @enderror"
                                                placeholder="Keywords">{{ $product->meta_keywords }}</textarea>

                                        </div>
                                    </div> --}}

                                    {{-- <div class="">

                                            <label for="destacar">Lo más pedido
                                            </label>

                                            <div class="relative mb-2  mt-2">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                            </div>
                                            <input type="checkbox" id="destacar" name="destacar"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                @if ($product->destacar) checked @endif>


                                            </div>
                                        </div>
                                        <div class="">

                                            <label for="recomendar">Novedad</label>

                                            <div class="relative mb-2  mt-2">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                            </div>
                                            <input type="checkbox" id="recomendar" name="recomendar"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                @if ($product->recomendar) checked @endif>
                                            </div>
                                        </div>
                                        <div class="">

                                            <label for="liquidacion">En liquidación</label>

                                            <div class="relative mb-2  mt-2">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                            </div>
                                            <input type="checkbox" id="liquidacion" name="liquidacion"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                @if ($product->liquidacion) checked @endif>
                                            </div>
                                    </div> --}}


                                </div>


                            </div>
                        </div>


                        <div class="basis-full md:basis-2/5">

                            <div
                                class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 ">
                                <div class="md:col-span-5 flex justify-between gap-4">
                                    <div class="w-full">
                                        <label for="precio">Precio <span class="text-red-500"> (Obligatorio)
                                        </span></label>
                                        <div class="relative mb-2  mt-2">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" width="512" height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>

                                        </div>
                                        <input type="number" id="precio" name="precio" value="{{ $product->precio }}"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="precio">
                                        </div>

                                    </div>



                                    {{-- <div class="w-full">
                                        <label for="descuento">Descuento</label>
                                        <div class="relative mb-2  mt-2">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" width="512" height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                        <input type="number" id="descuento" name="descuento" value="{{ $product->descuento }}"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="descuento">
                                        </div>

                                    </div> --}}
                                </div>

                                {{-- <div class="md:col-span-5">
                                    <label for="costo_x_art">Costo por articulo</label>
                                    <div class="relative mb-2  mt-2">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" width="512" height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        </div>
                                        <input type="number" id="costo_x_art" name="costo_x_art" value="{{ $product->costo_x_art }}"
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Costo por articulo">
                                    </div>
                                </div> --}}

                                <div class="md:col-span-5">
                                    <label for="costo_x_art">Categoria <span class="text-red-500"> (Obligatorio)
                                    </span></label>
                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" width="512"
                                                height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                        <select name="categoria_id"
                                            class="categoryselect mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="">Seleccionar Categoria</option>
                                            @foreach ($categoria as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $product->categoria_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="md:col-span-5 mt-2">

                                    <label for="seotitulo">SEO - Titulo (Google recomienda 60 caracteres - Nombre de producto por defecto)</label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="text" id="seotitulo" name="meta_title"
                                            value="{{ $product->meta_title }}"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('extract') is-invalid @enderror"
                                            placeholder="Titulo">
                                    </div>
                                </div>

                                <div class="md:col-span-5 mt-2">

                                    <label for="seodescription">SEO - Descripción (Google recomienda 160 caracteres - Descripción de producto por
                                        default)</label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <input type="text" id="seodescription" name="meta_description"
                                            value="{{ $product->meta_description }}"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('extract') is-invalid @enderror"
                                            placeholder="Descripción">

                                    </div>
                                </div>

                                <div class="md:col-span-5 mt-2">

                                    <label for="keyword">SEO - Keywords (Ingrese las palabras clave por
                                        comas)</label>

                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute top-2 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                class="">
                                                <g>
                                                    <path
                                                        d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                        fill="#9F9F9F" opacity="1" data-original="#000000"
                                                        class=""></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <textarea id="keyword" name="meta_keywords" value=""
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('extract') is-invalid @enderror"
                                            placeholder="Keywords">{{ $product->meta_keywords }}</textarea>

                                    </div>
                                </div>

                                {{-- <div class="md:col-span-5">
                                    <label for="costo_x_art">Subcategoria</label>
                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" width="512"
                                                height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                        <select name="subcategoria_id" id="selectSubcategory"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('categoria_id') is-invalid @enderror">
                                            <option value="">Seleccionar Subcategoria </option>
                                            @foreach ($subcategoria as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $product->subcategoria_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}


                                {{-- <div class="md:col-span-5">
                                    <label for="costo_x_art">Microcategoria</label>
                                    <div class="relative mb-2  mt-2">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" width="512"
                                                height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                        <select name="microcategoria_id" id="selectMicrocategory"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('categoria_id') is-invalid @enderror">
                                            <option value="">Seleccionar Microcategoria </option>
                                            @foreach ($microcategoria as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $product->microcategoria_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="md:col-span-5">
                                    <label for="costo_x_art">Colección</label>
                                    <div class="relative mb-2  mt-2">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" width="512" height="512" x="0" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        </div>
                                        <select name="collection_id"
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Seleccionar Colección </option>
                                        @foreach ($collection as $item)
                                            <option value="{{ $item->id }}"
                                            {{ $item->id == $product->collection_id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                        @endforeach

                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="md:col-span-5 mt-2">
                                    <div class=" flex items-end justify-between gap-2 ">
                                        <label for="especificacion">Especificacion </label>
                                        <button type="button" id="AddEspecifiacion"
                                            class="text-blue-500 hover:underline focus:outline-none font-medium">
                                            Agregar Especificacion
                                        </button>
                                    </div>
                                    @foreach ($especificacion as $item)
                                        <div class="flex gap-2">
                                            <div class="relative mb-2  mt-2 hidden">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                        height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                        style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <path
                                                                d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                                fill="#9F9F9F" opacity="1" data-original="#000000"
                                                                class=""></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <input type="text" id="tittle-{{ $item->id }}"
                                                    name="tittle-{{ $item->id }}" 
                                                    value="{{ $item->tittle }}"
                                                   
                                                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Tutulo">

                                            </div>
                                            <div class="relative mb-2  mt-2">
                                                <div
                                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                                        height="512" x="0" y="0" viewBox="0 0 469.336 469.336"
                                                        style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                        class="">
                                                        <g>
                                                            <path
                                                                d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                                                fill="#9F9F9F" opacity="1" data-original="#000000"
                                                                class=""></path>
                                                        </g>
                                                    </svg>
                                                </div>

                                                <input type="text" id="specifications-{{ $item->id }}"
                                                    name="specifications-{{ $item->id }}"
                                                    value="{{ $item->specifications }}"
                                                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Valor">
                                            </div>
                                        </div>
                                    @endforeach
                                </div> --}}


                                {{-- <div class="md:col-span-5">

                                    <label for="archive">Ficha Técnica:</label> 
                                    @if($product->name_fichatecnica)
                                         <span><a
                                                href="{{ asset($product->url_fichatecnica . $product->name_fichatecnica) }}"
                                                target="_blank">{{ $product->name_fichatecnica }}</a>
                                            <i onclick="borrarFicha({{ $product->id }})"
                                                class="ml-1 cursor-pointer absolute">
                                                <svg class="w-full" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                    height="20" x="0" y="0" viewBox="0 0 512 512"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g fill="#EF5350">
                                                            <path
                                                                d="M412.6 141.4v.1c0 .6-.2.9-.4 1.1s-.6.5-1.2.5h-11.4c-.4-.1-.9-.2-1.4-.2s-.9.1-1.4.2H115.1c-.4-.1-.9-.2-1.4-.2s-.9.1-1.4.2H101c-1 0-1.7-.8-1.7-1.7v-32.1c0-1 .8-1.7 1.7-1.7h310c1 0 1.7.8 1.7 1.7zM393.4 152.7V442c0 13.3-10.8 24.1-24.1 24.1H142.8c-13.3 0-24.1-10.8-24.1-24.1V152.7zM332 396.2V222.7c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v173.4c0 2.7 2.2 4.9 4.9 4.9 2.8 0 4.9-2.1 4.9-4.8zM261 409V209.9c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v199c0 2.7 2.2 4.9 4.9 4.9s4.9-2.1 4.9-4.8zm-71.1-12.8V222.7c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v173.4c0 2.7 2.2 4.9 4.9 4.9s4.8-2.1 4.9-4.8zM321.5 57.3v40.5h-9.7V57.3c0-.9-.7-1.7-1.7-1.7H201.8c-.9 0-1.7.7-1.7 1.7v40.5h-9.8V57.3c0-6.3 5.1-11.4 11.4-11.4H310c6.4 0 11.5 5.1 11.5 11.4z"
                                                                fill="#EF5350" opacity="1" data-original="#ef5350">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </i>
                                         </span>
                                    @endif
                                   
                                    <div class="relative mb-2  mt-2">
                                        <input name="fichatecnica" accept="application/pdf"
                                            class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                    </div>
                                </div>

                                <div class="md:col-span-5">
                                    <label for="archive">Hoja de Seguridad:</label>
                                     @if($product->name_docriesgo)
                                         <span><a
                                                href="{{ asset($product->url_docriesgo . $product->name_docriesgo) }}"
                                                target="_blank">{{ $product->name_docriesgo }}</a>
                                            <i onclick="borrarHoja({{ $product->id }})"
                                                class="ml-1 cursor-pointer absolute">
                                                <svg class="w-full" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                                    height="20" x="0" y="0" viewBox="0 0 512 512"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                    <g>
                                                        <g fill="#EF5350">
                                                            <path
                                                                d="M412.6 141.4v.1c0 .6-.2.9-.4 1.1s-.6.5-1.2.5h-11.4c-.4-.1-.9-.2-1.4-.2s-.9.1-1.4.2H115.1c-.4-.1-.9-.2-1.4-.2s-.9.1-1.4.2H101c-1 0-1.7-.8-1.7-1.7v-32.1c0-1 .8-1.7 1.7-1.7h310c1 0 1.7.8 1.7 1.7zM393.4 152.7V442c0 13.3-10.8 24.1-24.1 24.1H142.8c-13.3 0-24.1-10.8-24.1-24.1V152.7zM332 396.2V222.7c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v173.4c0 2.7 2.2 4.9 4.9 4.9 2.8 0 4.9-2.1 4.9-4.8zM261 409V209.9c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v199c0 2.7 2.2 4.9 4.9 4.9s4.9-2.1 4.9-4.8zm-71.1-12.8V222.7c0-2.7-2.2-4.9-4.9-4.9s-4.9 2.2-4.9 4.9v173.4c0 2.7 2.2 4.9 4.9 4.9s4.8-2.1 4.9-4.8zM321.5 57.3v40.5h-9.7V57.3c0-.9-.7-1.7-1.7-1.7H201.8c-.9 0-1.7.7-1.7 1.7v40.5h-9.8V57.3c0-6.3 5.1-11.4 11.4-11.4H310c6.4 0 11.5 5.1 11.5 11.4z"
                                                                fill="#EF5350" opacity="1" data-original="#ef5350">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </i>
                                         </span>
                                    @endif
                                    <div class="relative mb-2  mt-2">
                                        <input name="fichariesgo" accept="application/pdf"
                                            class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                    </div>
                                </div> --}}
                            </div>

                            {{-- <div
                                class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 ">
                                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                                    Galeria</h4>

                                <div class="md:col-span-5 mt-2">
                                    <section class="scroll-section overflow-y-auto" id="uploadedFilesGallery">
                                        <h2 class="small-title">Subir fotos para Galeria (1000x1000px)</h2>
                                        <div class="card mb-2">
                                            <div class="card-body">

                                                <div class="dropzone border-gray-300" id="dropzoneServerFilesGallery">
                                                </div>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div> --}}



                            {{-- <div class=" grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4 ">
                                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                                Inventario</h4>
                                <div class="md:col-span-5 flex justify-between gap-4">


                                <div class="w-full">
                                    <label for="sku">SKU

                                    </label>

                                    <div class="relative mb-2  mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                        x="0" y="0" viewBox="0 0 469.336 469.336" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve" class="">
                                        <g>
                                            <path
                                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                                            fill="#9F9F9F" opacity="1" data-original="#000000" class=""></path>
                                        </g>
                                        </svg>
                                    </div>
                                    <input type="text" id="sku" name="sku" value="{{ $product->sku }}"
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="# de sku">


                                    </div>
                                </div>


                                </div>
                            </div> --}}


                            {{-- <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-1 rounded shadow-lg p-4 px-4">
                                @foreach ($valorAtributo as $item)
                                @if ($item->attribute_id == 2)
                                    <div class="grid grid-cols-3">
                                    <label class="inline">{{ $item->valor }} </label>

                                    <input type="checkbox" id="hs-basic-usage"
                                        class="inline check_v btn_swithc relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent 
                                        rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-transparent disabled:opacity-50 disabled:pointer-events-none 
                                        checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-gray-800 dark:border-gray-700 
                                        dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6
                                        before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow        
                                        before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200"
                                        id='{{ 'v_' . $item->id }}' data-field='destacar' data-idService='{{ $item->id }}'
                                        data-titleService='{{ $item->producto }}' {{ $item->destacar == 1 ? 'checked' : '' }}>



                                    </div>
                                    <div hidden id="imagenesOcultas-{{ $item->id }}">
                                    <div class="flex gap-4 p-2">
                                        <label for="caratula">caratula</label>
                                        <input type="radio" name="caratula" value="{{ $item->id }}">
                                    </div>

                                    <input id="imagen" name="imagenP-{{ $item->id }}"
                                        class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                    <div class="dropzone border-gray-300 dropzoneSecond " id="dropzoneServerFilesGallery"
                                        name="attrid-{{ $item->id }}">
                                    </div>
                                    </div>
                                @endif
                                @endforeach
                            </div> --}}

                            {{-- <div
                                class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded shadow-lg p-4 px-4">
                                <div class="md:col-span-5 mt-2 ">
                                    <div class=" flex items-end justify-between gap-2 ">
                                        <label for="AddCombinacion">Combinaciones </label>
                                        <button type="button" id="AddCombinacion"
                                            class="text-blue-500 hover:underline focus:outline-none font-medium">
                                            Agregar Combinacion
                                        </button>
                                    </div>



                                    @foreach ($product->combinations as $item)
                                        <div id='combination-{{ $item->id }}'
                                            class="grid grid-cols-4 gap-2 items-center justify-center">

                                            <div class="mb-2 mt-2">
                                                @component('components.select', [
                                                    'name' => 'conbinacion-' . $item->id . '[color]',
                                                    'id' => 1,
                                                    'class' => 'mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                                                    'options' => $valorAtributo,
                                                    'defaultValue' => 1,
                                                    'value' => 'id',
                                                    'label' => 'valor',
                                                    'item' => $item,
                                                ])
                                                                                                @endcomponent

                                                                                            </div>
                                                                                            <div class="mb-2 mt-2">
                                                                                                @component('components.selectStock', [
                                                    'name' => 'conbinacion-' . $item->id . '[talla] ',
                                                    'id' => 1,
                                                    'class' => 'mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
                                                    'options' => $valorAtributo,
                                                    'defaultValue' => 1,
                                                    'value' => 'id',
                                                    'label' => 'valor',
                                                    'item' => $item,
                                                ])
                                                @endcomponent

                                            </div>

                                            <div class="mb-2 mt-2"><input type="text"
                                                    name="conbinacion-{{ $item->id }}[stock]" placeholder="Stock"
                                                    value="{{ $item->stock }}" id="stock-2"
                                                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <button
                                                class="ml-2 bg-red-500 justify-self-center   h-10 hover:bg-red-700 text-white font-bold 
                                                    py-2 px-4 rounded-full  eliminarConvinacion"
                                                value="combination-{{ $item->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    @endforeach



                                </div>

                            </div>
                            --}}
                            {{-- <div
                                class=" grid gap-4 gap-y-2 text-sm grid-cols-1 rounded shadow-lg p-4 px-4 ">
                                <h4 class="font-semibold text-slate-800 dark:text-slate-100 text-xl tracking-tight">
                                    Productos relacionados</h4>
                                <div class="flex justify-between gap-4">

                                    <div class="w-2/3">
                                        <div class="relative mb-2  mt-2">
                                            <select id="tags_id" name="tags_id[]" multiple class="w-full">
                                                @foreach ($productosRelacionados as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ in_array($item->id, $product->productrelacionados->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $item->producto }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>
                                </div>
                            </div>  --}}

                        </div>
                    </div>

                    <div class="md:col-span-5 text-right mt-6 flex justify-between px-4 pb-4">
                        <div class="inline-flex items-end">
                            <a href="{{ route('products.index') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Volver</a>
                        </div>
                        <div class="inline-flex items-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>


    </div>

    <script src="/ckeditor/ckeditor.js"></script>
    <script>
       CKEDITOR.replace('description', {
            toolbar: [
                { name: 'document', items: ['Source'] }, // Código fuente
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo'] },
                { name: 'styles', items: ['Styles', 'Format', 'FontSize'] }, // Tamaño y fuente
                { name: 'colors', items: ['TextColor', 'BGColor'] }, // Color de texto y fondo
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                { name: 'insert', items: ['Table', 'HorizontalRule'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'tools', items: ['Maximize'] } // Maximizar
            ],
            extraPlugins: 'colorbutton,font', // Activa plugins para color y fuentes
            removePlugins: 'elementspath', // Elimina la ruta de elementos
            resize_enabled: true // Permite redimensionar el editor
        });

        CKEDITOR.replace('especificacion', {
            toolbar: [
                { name: 'document', items: ['Source'] }, // Código fuente
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo'] },
                { name: 'styles', items: ['Styles', 'Format', 'FontSize'] }, // Tamaño y fuente
                { name: 'colors', items: ['TextColor', 'BGColor'] }, // Color de texto y fondo
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
                { name: 'insert', items: ['Table', 'HorizontalRule'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'tools', items: ['Maximize'] } // Maximizar
            ],
            extraPlugins: 'colorbutton,font', // Activa plugins para color y fuentes
            removePlugins: 'elementspath', // Elimina la ruta de elementos
            resize_enabled: true // Permite redimensionar el editor
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // let idsubcategory = document.querySelector('#selectSubcategory option:selected').value;
            let selectSubcategory = document.querySelector('#selectSubcategory');
            let idsubcategory = selectSubcategory.options[selectSubcategory.selectedIndex].value;
            //let idcategory = document.querySelector('.categoryselect option:selected').value;
            let selectCategory = document.querySelector('.categoryselect');
            let idcategory = selectCategory.options[selectCategory.selectedIndex].value;


            // Obtener los valores de PHP y asignarlos a variables de JavaScript
            let idproductCategory = {{ json_encode($product->subcategoria_id) }};
            let idproductMicrocategory = {{ json_encode($product->microcategoria_id) }};

            // Verificar si idproductMicrocategory es nulo
            if (idproductMicrocategory === null) {
                idproductMicrocategory = 0;
            }

            $.ajax({
                url: '{{ route('getSubcategoria') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: idcategory

                },
                dataType: "json",
                success: function(response) {

                    $('#selectSubcategory').empty();
                    $('#selectSubcategory').append('<option value="">Selecciona Subcategoria</option>');
                    $.each(response.subcategorias, function(key, value) {

                        let selected = (value.id == idproductCategory) ? 'selected' : '';
                        $('#selectSubcategory').append(
                            '<option value="' + value.id + '" ' + selected + '>' + value
                            .name + '</option>'
                        );
                    });


                },
                error: function(error) {

                }
            });

            $.ajax({
                url: '{{ route('getMicrocategoria') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: idsubcategory
                },
                dataType: "json",
                success: function(response) {

                    $('#selectMicrocategory').empty();

                    if (response.microcategorias && response.microcategorias.length > 0) {
                        $.each(response.microcategorias, function(key, value) {
                            let selected = (value.id == idproductMicrocategory) ? 'selected' :
                                '';
                            $('#selectMicrocategory').append(
                                '<option value="' + value.id + '" ' + selected + '>' + value
                                .name + '</option>'
                            );
                        });
                    } else {
                        $('#selectMicrocategory').append(
                            '<option value="">Sin microcategorias</option>'
                        );
                    }

                },
                error: function(error) {

                }
            });

        });
    </script>

    <script>
        $('#selectSubcategory').change(function() {

            var id = $('#selectSubcategory').val();
            $.ajax({
                url: '{{ route('getMicrocategoria') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    //    console.log(response);
                    $('#selectMicrocategory').empty();
                    if (response.microcategorias && response.microcategorias.length > 0) {
                        $.each(response.microcategorias, function(key, value) {
                            $('#selectMicrocategory').append(
                                '<option value="' + value['id'] + '">' + value[
                                    'name'] +
                                '</option>'
                            );
                        });
                    } else {
                        $('#selectMicrocategory').append(
                            '<option value="">Sin microcategorias</option>'
                        );
                    }



                },
                error: function(error) {

                }
            });


        });


        $('.categoryselect').change(function() {

            var id = $('.categoryselect').val();
            // var status = $(this).attr('data-val');

            console.log("qweqweqw");
            console.log("aaaaa");

            $.ajax({
                url: '{{ route('getSubcategoria') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    //    console.log(response);
                    $('#selectSubcategory').empty();
                    $('#selectMicrocategory').empty();
                    $('#selectMicrocategory').append(
                        '<option value="">Selecciona Microcategoria</option>');
                    $('#selectSubcategory').append('<option value="">Selecciona Subcategoria</option>');

                    if (response.subcategorias && response.subcategorias.length > 0) {
                        $.each(response.subcategorias, function(key, value) {
                            $('#selectSubcategory').append(
                                '<option value="' + value['id'] + '">' + value['name'] +
                                '</option>'
                            );

                        });
                    } else {
                        $('#selectSubcategory').append(
                            '<option value="">Sin subcategorias</option>'
                        );
                    }



                },
                error: function(error) {

                }
            });

        });
    </script>

    <script>
       
        $('#tags_id').select2();
        // Obtener los enlaces de pestaña
        const generalTab = document.getElementById('general-tab');
        const attributesTab = document.getElementById('attributes-tab');

        // Obtener los contenedores de contenido
        const generalContent = document.getElementById('general');
        const attributesContent = document.getElementById('Attributes');

        // Agregar event listeners para los enlaces de pestaña
        generalTab.addEventListener('click', function(event) {
            generalTab.classList.add('active', 'dark:bg-slate-900')
            attributesTab.classList.remove('active', 'dark:bg-slate-900')
            // Ocultar el contenido de Attributes
            attributesContent.classList.add('hidden');
            // Mostrar el contenido de General
            generalContent.classList.remove('hidden');
        });

        attributesTab.addEventListener('click', function(event) {
            generalTab.classList.remove('active', 'dark:bg-slate-900')
            attributesTab.classList.add('active', 'dark:bg-slate-900')
            // Ocultar el contenido de General
            generalContent.classList.add('hidden');
            // Mostrar el contenido de Attributes
            attributesContent.classList.remove('hidden');
        });
    </script>
    <script>
        const pickr = Pickr.create({
            el: '#colorPicker', // Selector CSS del input
            theme: 'classic', // Tema de Pickr
            default: '#000000', // Color por defecto
            swatches: [ // Colores de muestra
                '#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#00FFFF', '#FF00FF'
            ],
            components: {
                preview: true, // Mostrar vista previa
                opacity: true, // Habilitar control de opacidad
                hue: true, // Habilitar control de matiz
                interaction: {
                    input: true, // Permitir entrada manual
                    hex: true,
                    save: true // Permitir guardar
                }
            }
        });
        pickr.on('save', (color, instance) => {

            document.getElementById('color').value = color.toHEXA().toString();

        })
    </script>
    <script>
        function toggleMenu() {
            console.log('cambiando toggle')
            var menuItems = document.getElementById('menu-items');
            var isExpanded = menuItems.classList.contains('hidden');
            menuItems.classList.toggle('hidden', !isExpanded);
            document.getElementById('menu-button').setAttribute('aria-expanded', !isExpanded);
        }
    </script>


    <script>
        $('document').ready(function() {
            let valorInput = 1

            $("#AddEspecifiacion").on('click', function(e) {
                e.preventDefault()
                valorInput++
                console.log('agregando especificacion')
                const addButton = document.getElementById("AddEspecifiacion");
                const divFlex = document.createElement("div");
                const dRelative = document.createElement("div");
                const dRelative2 = document.createElement("div");

                divFlex.classList.add('flex', 'gap-2')
                dRelative.classList.add('relative', 'mb-2', 'mt-2')
                dRelative2.classList.add('relative', 'mb-2', 'mt-2')

                const iconContainer = document.createElement("div");
                const icon = `<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0"
                        y="0" viewBox="0 0 469.336 469.336" style="enable-background:new 0 0 512 512"
                        xml:space="preserve" class="">
                        <g>
                            <path
                            d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                            fill="#9F9F9F" opacity="1" data-original="#000000" class=""></path>
                        </g>
                        </svg>
                    </div>`
                iconContainer.innerHTML = icon;

                // Obtener el nodo del icono
                const iconNode = iconContainer.firstChild;



                const inputTittle = document.createElement("input");
                const inputValue = document.createElement("input");

                let inputT = agregarElementos(inputTittle, valorInput, 'tittle')
                let inputV = agregarElementos(inputValue, valorInput, 'specifications')


                dRelative.appendChild(inputT);
                dRelative2.appendChild(inputV);


                // Agregar el icono como primer hijo de dRelative
                dRelative.insertBefore(iconNode, inputT);

                // Clonar el nodo del icono para agregarlo como primer hijo de dRelative2
                const iconNodeCloned = iconNode.cloneNode(true);
                dRelative2.insertBefore(iconNodeCloned, inputV);


                divFlex.appendChild(dRelative);
                divFlex.appendChild(dRelative2);

                const parentContainer = addButton.parentElement
                    .parentElement; // Obtener el contenedor padre
                parentContainer.insertBefore(divFlex, addButton.parentElement
                    .nextSibling); // Insertar el input antes del siguiente elemento después del botón

            })
        })
    </script>

    <script>
        $(document).on('click', '.eliminarConvinacion', function(e) {
            console.log(e.target)
            e.preventDefault()

            let targetButton = e.target.closest('button.eliminarConvinacion');
            $(`#${targetButton.value}`).remove()

        })

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function agregarCombinacion(elemento, valorInput, name) {
            elemento.setAttribute("type", "text");
            elemento.setAttribute("name", `updateComb-${valorInput}[${name}]`);
            elemento.setAttribute("placeholder", `${capitalizeFirstLetter(name)}`);
            elemento.setAttribute("id", `${name}-${valorInput}`);

            let valorAtributo = @json($valorAtributo);
            let switchColor = $('.btn_swithc:checked')
            const noSwitchActive = switchColor.length === 0;

            const optionElement = document.createElement("option");
            optionElement.setAttribute("value", "0");
            optionElement.textContent = name == 'color' ? 'Color' : "Talla";
            elemento.appendChild(optionElement);

            if (name == 'color') {
                valorAtributo.forEach(optionText => {
                    if (optionText.attribute_id == 2) {
                        const optionElement = document.createElement("option");

                        optionElement.setAttribute("value", optionText.id);

                        optionElement.setAttribute('hidden', true);


                        const serviceId = optionText.id; // Assuming id in optionsData matches data-idService
                        // const correspondingSwitch = $(`.btn_switch[data-idService=${serviceId}]`);

                        switchColor.each(function() {
                            const idService = $(this).data('idservice');
                            console.log(idService, serviceId)
                            if (idService === serviceId) {
                                optionElement.removeAttribute('hidden');
                            }
                        })




                        optionElement.textContent = optionText.valor;
                        elemento.appendChild(optionElement);
                    }



                });




            } else {

                valorAtributo.forEach(optionText => {
                    if (optionText.attribute_id == 1) {
                        const optionElement = document.createElement("option");
                        optionElement.setAttribute("value", optionText.id);
                        optionElement.textContent = optionText.valor;
                        elemento.appendChild(optionElement);
                    }

                });

            }



            elemento.classList.add("mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm",
                "rounded-lg",
                "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "p-2.5",
                "dark:bg-gray-700",
                "dark:border-gray-600", "dark:placeholder-gray-400", "dark:text-white",
                "dark:focus:ring-blue-500",
                "dark:focus:border-blue-500");

            return elemento
        }

        function agregarinputStock(elemento, valorInput, name) {
            elemento.setAttribute("type", "text");
            elemento.setAttribute("name", `updateComb-${valorInput}[stock]`);
            elemento.setAttribute("placeholder", `${capitalizeFirstLetter(name)}`);
            elemento.setAttribute("id", `${name}-${valorInput}`);


            elemento.classList.add("mt-1", "bg-gray-50", "border", "border-gray-300", "text-gray-900", "text-sm",
                "rounded-lg",
                "focus:ring-blue-500", "focus:border-blue-500", "block", "w-full", "p-2.5",
                "dark:bg-gray-700",
                "dark:border-gray-600", "dark:placeholder-gray-400", "dark:text-white",
                "dark:focus:ring-blue-500",
                "dark:focus:border-blue-500");

            return elemento

        }
        let valorInput = 1
        $("#AddCombinacion").on('click', function(e) {
            e.preventDefault()
            valorInput++
            console.log('agregando especificacion')
            const addButton = document.getElementById("AddCombinacion");
            const divFlex = document.createElement("div");
            const dRelative = document.createElement("div");
            const dRelative2 = document.createElement("div");
            const dRelative3 = document.createElement("div");

            divFlex.id = `combination-${valorInput}`;

            divFlex.classList.add('grid', 'grid-cols-4', 'gap-2', 'items-center', 'justify-center')
            dRelative.classList.add('mb-2', 'mt-2')
            dRelative2.classList.add('mb-2', 'mt-2')
            dRelative3.classList.add('mb-2', 'mt-2')

            const iconContainer = document.createElement("div");
            const icon = `<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                      version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0"
                      y="0" viewBox="0 0 469.336 469.336" style="enable-background:new 0 0 512 512"
                      xml:space="preserve" class="">
                      <g>
                        <path
                          d="m456.836 76.168-64-64.054c-16.125-16.139-44.177-16.17-60.365.031L45.763 301.682a10.733 10.733 0 0 0-2.688 4.587L.409 455.73a10.682 10.682 0 0 0 10.261 13.606c.979 0 1.969-.136 2.927-.407l149.333-42.703a10.714 10.714 0 0 0 4.583-2.69l289.323-286.983c8.063-8.069 12.5-18.787 12.5-30.192s-4.437-22.124-12.5-30.193zM285.989 89.737l39.264 39.264-204.996 204.997-14.712-29.434a10.671 10.671 0 0 0-9.542-5.896H78.921L285.989 89.737zm-259.788 353.4L40.095 394.5l34.742 34.742-48.636 13.895zm123.135-35.177-51.035 14.579-51.503-51.503 14.579-51.035h28.031l18.385 36.771a10.671 10.671 0 0 0 4.771 4.771l36.771 18.385v28.032zm21.334-17.543v-17.082c0-4.042-2.281-7.729-5.896-9.542l-29.434-14.712 204.996-204.996 39.264 39.264-208.93 207.068zM441.784 121.72l-47.033 46.613-93.747-93.747 46.582-47.001c8.063-8.063 22.104-8.063 30.167 0l64 64c4.031 4.031 6.25 9.385 6.25 15.083s-2.219 11.052-6.219 15.052z"
                          fill="#9F9F9F" opacity="1" data-original="#000000" class=""></path>
                      </g>
                    </svg>
                  </div>`
            iconContainer.innerHTML = icon;

            // Obtener el nodo del icono
            const iconNode = iconContainer.firstChild;



            const deleteButton = document.createElement("button");
            deleteButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            `;
            deleteButton.className =
                "ml-2 bg-red-500 justify-self-center text-white px-4 h-10 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full  eliminarConvinacion";
            deleteButton.setAttribute('value', `combination-${valorInput}`)
            deleteButton.onclick = function(e) {
                e.preventDefault()

            };
            const inputTittle = document.createElement("select");
            const inputValue = document.createElement("select");
            const inputStock = document.createElement("input")

            let inputT = agregarCombinacion(inputTittle, valorInput, 'color')
            let inputV = agregarCombinacion(inputValue, valorInput, 'talla')
            let inputS = agregarinputStock(inputStock, valorInput, 'stock')


            dRelative.appendChild(inputT);
            dRelative2.appendChild(inputV);
            dRelative3.appendChild(inputS);


            // Agregar el icono como primer hijo de dRelative
            // dRelative.insertBefore(iconNode, inputT);

            // Clonar el nodo del icono para agregarlo como primer hijo de dRelative2
            // const iconNodeCloned = iconNode.cloneNode(true);
            // dRelative2.insertBefore(iconNodeCloned, inputV);
            // dRelative3.insertBefore(iconNodeCloned, inputS);


            divFlex.appendChild(dRelative);
            divFlex.appendChild(dRelative2);
            divFlex.appendChild(dRelative3);
            divFlex.appendChild(deleteButton);

            const parentContainer = addButton.parentElement
                .parentElement; // Obtener el contenedor padre
            parentContainer.insertBefore(divFlex, addButton.parentElement
                .nextSibling); // Insertar el input antes del siguiente elemento después del botón



        })
    </script>
    <script>
        $(document).ready(function() {
            $('.btn_swithc').change(function(e) {

                let idService = $(this).attr('data-idService');


                if ($(this).is(':checked')) {
                    $(`#imagenesOcultas-${idService}`).removeAttr('hidden');
                } else {
                    $(`#imagenesOcultas-${idService}`).attr('hidden', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function initializeDropzone(element, nameValue) {


                new Dropzone(element, {
                    url: 'https://httpbin.org/post',

                    autoProcessQueue: false,
                    thumbnailWidth: 160,
                    previewTemplate: DropzoneTemplates.previewTemplate,
                    init: function() {
                        this.on('success', function(file, responseText) {
                            console.log(responseText);
                        });
                        let container = 0
                        this.on('addedfile', async (file) => {
                            console.log('addedfile', file)
                            if (container < 5) {
                                container++
                                console.log(container)
                                const input = document.createElement('input')
                                input.name = `${nameValue}[]`
                                input.value = await File.toBase64(file)
                                input.type = 'hidden'


                                $(element).append($(input))
                                // Showing file preview if it is not image
                                if (file.type && !file.type.match(/image.*/)) {
                                    if (!file.documentPrev) {
                                        file.previewTemplate.classList.remove(
                                            'dz-image-preview');
                                        file.previewTemplate.classList.add(
                                            'dz-file-preview');
                                        file.previewTemplate.classList.add('dz-complete');
                                        file.documentPrev = true;
                                        this.emit('addedfile', file);
                                        this.removeFile(file);


                                    }
                                }
                            }

                        });


                        this.element.classList.add('dz-started');


                    },
                });
            }

            function initializeAllDropzones() {
                $('.dropzoneSecond').each(function() {


                    let $element = $(this);
                    let nameValue = $element.attr('name');
                    console.log(nameValue);
                    initializeDropzone(this, nameValue);
                });
            }

            initializeAllDropzones();

        })
    </script>
    <script>
        File.toBase64 = function(blob) {
            return new Promise((resolve, reject) => {
                let reader = new FileReader();
                reader.onloadend = () => {
                    resolve(reader.result);
                }
                reader.onerror = () => {
                    reject(new Error('No se pudo convertir el archivo en base64'));
                }
                reader.readAsDataURL(blob);
            });
        }
    </script>
    <script>
        function borrarImg(id) {
            console.log('borranmdo ', id)

            $.ajax({
                url: "{{ route('activity.borrarimg') }}",
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    status: status,
                    id: id,

                },
                success: function(success) {
                    Swal.fire({

                        icon: "success",
                        title: 'Img borrada exitosamente',
                        showConfirmButton: false,
                        timer: 1500

                    });
                    $(`#portada-${id}`).remove()
                },
                error: function(error) {
                    console.log(error)
                }

            })
        }


        function borrarFicha(id) {

            $.ajax({
                url: "{{ route('activity.borrarficha') }}",
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    status: status,
                    id: id,

                },
                success: function(success) {
                    Swal.fire({

                        icon: "success",
                        title: 'Ficha eliminada exitosamente',
                        showConfirmButton: false,
                        timer: 1500

                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(error) {
                    console.log(error)
                }

            })
        }
    </script>

    <script>
        function borrarHoja(id) {
           
            $.ajax({
                url: "{{ route('activity.borrarhoja') }}",
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    status: status,
                    id: id,

                },
                success: function(success) {
                    Swal.fire({

                        icon: "success",
                        title: 'Hoja eliminada exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                        
                    }).then(() => {
                        location.reload();
                    });
                    
                },
                error: function(error) {
                    console.log(error)
                }

            })
        }
    </script>

    @include('_layout.scripts')

</x-app-layout>
