<?php

namespace App\Http\Controllers;

use App\Models\NosotrosView;
use App\Http\Requests\StoreNosotrosViewRequest;
use App\Http\Requests\UpdateNosotrosViewRequest;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class NosotrosViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreNosotrosViewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NosotrosView $nosotrosView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NosotrosView $nosotrosView)
    {   
        $nosotros = NosotrosView::first();
        if (!$nosotros) {
            $nosotros = NosotrosView::create();
        }
        return view('pages.nosotrosview.edit', compact('nosotros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nosotros = NosotrosView::findOrfail($id); 

        if ($request->hasFile("imagen_dos")) {
            $file = $request->file('imagen_dos');
            $routeImg = 'storage/images/nosotroshome/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
            $this->saveImg($file, $routeImg, $nombreImagen);
      
            $nosotros['url_image2section'] = $routeImg . $nombreImagen;
        } 

        if ($request->hasFile("imagen_tres")) {
            $file = $request->file('imagen_tres');
            $routeImg = 'storage/images/nosotroshome/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
            $this->saveImg($file, $routeImg, $nombreImagen);
      
            $nosotros['url_image3section'] = $routeImg . $nombreImagen;
        } 

        if ($request->hasFile("imagen_cinco")) {
            $file = $request->file('imagen_cinco');
            $routeImg = 'storage/images/nosotroshome/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
            $this->saveImg($file, $routeImg, $nombreImagen);
      
            $nosotros['url_image5section'] = $routeImg . $nombreImagen;
        } 

        if ($request->hasFile("imagen_seis")) {
            $file = $request->file('imagen_seis');
            $routeImg = 'storage/images/nosotroshome/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
            $this->saveImg($file, $routeImg, $nombreImagen);
      
            $nosotros['url_image6section'] = $routeImg . $nombreImagen;
        }

        if ($request->hasFile("imagen_siete")) {
            $file = $request->file('imagen_siete');
            $routeImg = 'storage/images/nosotroshome/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
            $this->saveImg($file, $routeImg, $nombreImagen);
      
            $nosotros['url_image7section'] = $routeImg . $nombreImagen;
        } 

        $nosotros->update($request->all());

        $nosotros->save();  

        return back()->with('success', 'Registro actualizado correctamente');
    }

    public function saveImg($file, $route, $nombreImagen)
    {
      $manager = new ImageManager(new Driver());
      $img =  $manager->read($file);
      // $img->coverDown(1000, 1500, 'center');
  
      if (!file_exists($route)) {
        mkdir($route, 0777, true);
      }
  
      $img->save($route . $nombreImagen);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NosotrosView $nosotrosView)
    {
        //
    }
}
