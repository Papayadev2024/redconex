<?php

namespace App\Http\Controllers;

use App\Models\ClaimOsiptel;
use App\Http\Requests\StoreClaimOsiptelRequest;
use App\Http\Requests\UpdateClaimOsiptelRequest;

use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClaimOsiptelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = ClaimOsiptel::orderBy('created_at', 'DESC')->get();
        return view('pages.claimosiptel.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function savereclamo(Request $request)
    {   
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            
            'project' => 'required|string',
            'name_dad' => 'nullable|string',
            'name_mom' => 'nullable|string',
            'birthay' => 'nullable|date',
            'address_birthay' => 'nullable|string',
            
            // Paso 2
            'type_person' => 'required|string',
            'role' => 'required|string',
            
            // Persona natural
            'type_document' => 'required_if:role,Persona natural|string|nullable',
            'doc_number' => 'required_if:role,Persona natural|string|nullable',
            'name_titular' => 'required_if:role,Persona natural|string|nullable',
            'lastname_titular' => 'required_if:role,Persona natural|string|nullable',
            
            // Persona jurídica
            'ruc' => 'required_if:role,Persona juridica|string|nullable',
            'name_business' => 'required_if:role,Persona juridica|string|nullable',
            
            // Dirección
            'address_dep' => 'required|string',
            'address_prov' => 'required|string',
            'address_district' => 'required|string',
            'adress_location' => 'required|string',
            'code_service' => 'required|string',
            
            // Reclamante
            'type_document_legal' => 'required|string',
            'doc_number_legal' => 'required|string',
            'name_legal' => 'required|string',
            'lastname_legal' => 'required|string',
            'address_email' => 'required|email',
            'phone_mobile' => 'required|string',
            
            // Documento adjunto
            'doc_archive' => 'required|boolean',
            'archive' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            
            // Notificación
            'notification' => 'required|boolean',
            'address_email_noti' => 'nullable|email',
            'address_dep_noti' => 'nullable|string',
            'address_prov_noti' => 'nullable|string',
            'address_district_noti' => 'nullable|string',
            'address_location_noti' => 'nullable|string',
            'address_reference_noti' => 'nullable|string',
            
            // Reclamo
            'claim_issue' => 'required|string',
            'claim_issue_second' => 'nullable|string',
            'amount_claim' => 'nullable|numeric',
            'number_recibe' => 'nullable|string',
            'date_emision' => 'nullable|date',
            'date_finish' => 'nullable|date',
            'claim' => 'required|string|max:5000',
            
            // Documento adicional
            'doc_aditional' => 'required|boolean',
            'archive_aditional' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();


        if ($request->hasFile('archive')) {
            $file = $request->file('archive');
            $routeImg = 'storage/images/osiptel/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

            $this->saveFile($file, $routeImg, $nombreImagen);

            $data['archive_path'] = $routeImg.$nombreImagen;
        }

        if ($request->hasFile('archive_aditional')) {
            $file = $request->file('archive_aditional');
            $routeImg = 'storage/images/osiptel/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

            $this->saveFile($file, $routeImg, $nombreImagen);

            $data['archive_aditional_path'] = $routeImg.$nombreImagen;
        }
            
        // Crear el reclamo
        $claim = ClaimOsiptel::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Reclamo registrado correctamente',
            'claim_number' => $claim->claim_number,
            'data' => $claim
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = ClaimOsiptel::findOrFail($id);
        $message->is_read = 1; 
        $message->save();

        return view('pages.claimosiptel.show', compact('message'));
    }

    public function saveFile($file, $route, $fileName)
    {
        if (!file_exists($route)) {
            mkdir($route, 0777, true);
        }

        if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $manager = new ImageManager(new Driver());
            $img = $manager->read($file);
            $img->save($route . $fileName);
        } else {
            $file->move($route, $fileName);
        }
    }

    public function showSuccess(Request $request)
    {   
        $general = General::first();
        $claimNumber = $request->query('numero');
        $claim = ClaimOsiptel::where('claim_number', $claimNumber)->firstOrFail();
        return view('public.reclamo-exitoso', compact('claim','general'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClaimOsiptel $claimOsiptel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClaimOsiptelRequest $request, ClaimOsiptel $claimOsiptel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClaimOsiptel $claimOsiptel)
    {
        //
    }
}
