<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Combinacion;
use App\Models\Galerie;
use App\Models\ImagenProducto;
use App\Models\Microcategory;
use App\Models\Products;
use App\Models\Specifications;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use SoDe\Extend\File as ExtendFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products =  Products::where("status", "=", true)->with('images')->get();
    return view('pages.products.index', compact('products'));
  }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $atributos = Attributes::where("status", "=", true)->get();
    $valorAtributo = AttributesValues::where("status", "=", true)->get();
    $tags = Tag::where("status", "=", true)->get();
    $categoria = Category::where("status", "=", true)->get();
    $productosRelacionados = Products::where('status', '=', 1)->get();
    $collection = Collection::all();
    return view('pages.products.create', compact('atributos', 'valorAtributo', 'categoria', 'tags', 'collection', 'productosRelacionados'));
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
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
   
    $especificaciones = [];
    $data = $request->all();
    $atributos = null;
    $productosSeleccionados = $request->input('products_id');
    $onlyOneCaratula = false;
    

    // if(is_null($request->input('descuento'))){
    //   $request->merge(['descuento' => 0]);
    //   $data['descuento'];
    // }
    
    // $valorprecio = $request->input('precio') - 0.1;

    try {
      $request->validate([
        'producto' => 'required',
        'precio' => 'required',
        'categoria_id' => 'required', 
      ]);

      if ($request->hasFile("imagen")) {
        $file = $request->file('imagen');
        $routeImg = 'storage/images/productos/';
        $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

        $this->saveImg($file, $routeImg, $nombreImagen);

        $data['imagen'] = $routeImg . $nombreImagen;
        // $AboutUs->name_image = $nombreImagen;
      } else {
        $routeImg = 'images/img/';
        $nombreImagen = 'noimagen.jpg';

        $data['imagen'] = $routeImg . $nombreImagen;
      }


      if ($request->hasFile("fichatecnica")) {
				$file = $request->file('fichatecnica');
				$routearchive = 'storage/archives/';
				$nombrearchive = Str::random(10) . '_' . $file->getClientOriginalName();
                
				if (!file_exists($routearchive)) {
                    mkdir($routearchive, 0777, true);
                }

                $file->move($routearchive, $nombrearchive);

                $data['url_fichatecnica'] = $routearchive;
                $data['name_fichatecnica'] = $nombrearchive;
			}


      if ($request->hasFile("fichariesgo")) {
				$file = $request->file('fichariesgo');
				$routearchive2 = 'storage/archives/';
				$nombrearchive2 = Str::random(10) . '_' . $file->getClientOriginalName();
                
				if (!file_exists($routearchive2)) {
                    mkdir($routearchive2, 0777, true);
                }

                $file->move($routearchive2, $nombrearchive2);

                $data['url_docriesgo'] = $routearchive2;
                $data['name_docriesgo'] = $nombrearchive2;
			}



      foreach ($data as $key => $value) {

        if (strstr($key, ':')) {
          // Separa el nombre del atributo y su valor
          $atributos = $this->stringToObject($key, $atributos);
          //$atributoName = Attributes::where('titulo', )
          unset($request[$key]);
        } elseif (strstr($key, '-')) {

          //strpos primera ocurrencia que enuentre
          if (strpos($key, 'tittle-') === 0 || strpos($key, 'title-') === 0) {
            $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
            $especificaciones[$num]['tittle'] = $value; // Agregar el título al array asociativo
          } elseif (strpos($key, 'specifications-') === 0) {
            $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
            $especificaciones[$num]['specifications'] = $value; // Agregar las especificaciones al array asociativo
          }
        }
      }

      $jsonAtributos = json_encode($atributos);

      if (array_key_exists('destacar', $data)) {
        if (strtolower($data['destacar']) == 'on') $data['destacar'] = 1;
      }
      if (array_key_exists('recomendar', $data)) {
        if (strtolower($data['recomendar']) == 'on') $data['recomendar'] = 1;
      }
      if (array_key_exists('liquidacion', $data)) {
        if (strtolower($data['liquidacion']) == 'on') $data['liquidacion'] = 1;
      }


      $data['atributes'] = $jsonAtributos;


      $cleanedData = Arr::where($data, function ($value, $key) {
        return !is_null($value);
      });


      $producto = Products::create($cleanedData);

      // if ($producto['descuento'] == 0 || is_null($producto['descuento'])) {
      //   $precioFiltro = $producto['precio'];
      // } else {
      //   $precioFiltro = $producto['descuento'];
      // }
      // $producto->update(['preciofiltro' => $precioFiltro]);

      if (isset($atributos)) {
        foreach ($atributos as $atributo => $valores) {
          $idAtributo = Attributes::where('titulo', $atributo)->first();

          foreach ($valores as $valor) {
            $idValorAtributo = AttributesValues::where('valor', $valor)->first();

            if ($idAtributo && $idValorAtributo) {
              DB::table('attribute_product_values')->insert([
                'product_id' => $producto->id,
                'attribute_id' => $idAtributo->id,
                'attribute_value_id' => $idValorAtributo->id,
              ]);
            }
          }
        }
      }


      $this->GuardarEspecificaciones($producto->id, $especificaciones);

     /*  if (!is_null($tagsSeleccionados)) {
        $this->TagsXProducts($producto->id, $tagsSeleccionados);
      } */

      $producto->productrelacionados()->sync($productosSeleccionados);


      if (isset($data['filesGallery'])) {

        foreach ($data['filesGallery'] as $file) {
        
          [$first, $code] = explode(';base64,', $file);
   
          $imageData = base64_decode($code);

          $routeImg = 'storage/images/gallery/';
          $ext = ExtendFile::getExtention(str_replace("data:", '', $first));
          $nombreImagen = Str::random(10) . '.' . $ext;
          // Verificar si la ruta no existe y crearla si es necesario
          if (!file_exists($routeImg)) {
            mkdir($routeImg, 0777, true); 
          }
          
          // Guardar los datos binarios en un archivo
          file_put_contents($routeImg . $nombreImagen, $imageData);
          $dataGalerie['imagen'] = $routeImg . $nombreImagen;
          $dataGalerie['product_id'] = $producto->id;
          // $dataGalerie['type_img'] = 'gall';
          Galerie::create($dataGalerie);
        }
      }




      return redirect()->route('products.index')->with('success', 'Publicación creado exitosamente.');
    } catch (ValidationException $e) {
      // Redirigir con los errores de validación y los datos de entrada
      return redirect()->back()
        ->withErrors($e->validator)
        ->withInput();
    } catch (\Throwable $th) {
      //throw $th;
      return redirect()->route('products.create')->with('error', 'Llenar campos obligatorios');
    }
  }
  private function GuardarCombinacion($producto_id, $combinacion)
  {
    Combinacion::create([

      'product_id' => $producto_id,
      'color_id' => $combinacion['color'],
      'talla_id' => $combinacion['talla'],
      'stock' => $combinacion['stock'],
    ]);
  }
  private function GuardarGaleria($file, $producto_id, $colorId)
  {

    try {
      //code...
      [$first, $code] = explode(';base64,', $file);



      $imageData = base64_decode($code);


      $routeImg = 'storage/images/gallery/';
      $ext = ExtendFile::getExtention(str_replace("data:", '', $first));
      $nombreImagen = Str::random(10) . '.' . $ext;
      // Verificar si la ruta no existe y crearla si es necesario
      if (!file_exists($routeImg)) {
        mkdir($routeImg, 0777, true);
      }
      // Guardar los datos binarios en un archivo
      file_put_contents($routeImg . $nombreImagen, $imageData);
      $dataGalerie['name_imagen'] = $routeImg . $nombreImagen;
      $dataGalerie['product_id'] = $producto_id;
      $dataGalerie['type_imagen'] = 'secondary';
      $dataGalerie['caratula'] = 0;
      $dataGalerie['color_id'] = $colorId;
      
      // $dataGalerie['type_img'] = 'gall';
      ImagenProducto::create($dataGalerie);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  private function TagsXProducts($id, $nTags)
  {
    foreach ($nTags as $key => $value) {
      DB::insert('insert into product_xproducts (product_id, related_product_id) values (?, ?)', [$id, $value]);
    }
  }


  private function GuardarEspecificaciones($id, $especificaciones)
  {

    foreach ($especificaciones as $value) {
      $value['product_id'] = $id;
      Specifications::create($value);
    }
  }

  private function actualizarEspecificacion($especificaciones)
  {
    foreach ($especificaciones as $key => $value) {
      $espect = Specifications::find($key);
      $espect->tittle = $value['tittle'];
      $espect->specifications = $value['specifications'];

      if ($value['specifications'] == null) {
        $espect->delete();
      } else {
        $espect->save();
      }
    }
  }

  private function stringToObject($key, $atributos)
  {

    $parts = explode(':', $key);
    $nombre = strtolower($parts[0]); // Nombre del atributo
    $valor = strtolower($parts[1]); // Valor del atributo en minúsculas

    // Verifica si el atributo ya existe en el array
    if (isset($atributos[$nombre])) {
      // Si el atributo ya existe, agrega el nuevo valor a su lista
      $atributos[$nombre][] = $valor;
    } else {
      // Si el atributo no existe, crea una nueva lista con el valor
      $atributos[$nombre] = [$valor];
    }
    return $atributos;
  }

  /**
   * Display the specified resource.
   */
  public function show(Products $products)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {

    $product =  Products::with('tags')->find($id);
    $atributos = Attributes::where("status", "=", true)->get();
    $valorAtributo = AttributesValues::where("status", "=", true)->get();
    $especificacion = Specifications::where("product_id", "=", $id)->get();
    // $allTags = Tag::all();
    $productosRelacionados = Products::where('status', '=', 1) ->where('id', '!=', $id)->get();
    $categoria = Category::where("status", "=", true)->get();
    $subcategoria = Subcategory::all();
    $microcategoria = Microcategory::all();
    $collection = Collection::all();

    return view('pages.products.edit', compact('product', 'atributos', 'valorAtributo', 'productosRelacionados', 'categoria', 'subcategoria', 'microcategoria', 'especificacion', 'collection'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $onlyOneCaratula= false;
    $cleanGaleria = true;
    $especificaciones = [];
    $product = Products::find($id);
    $tagsSeleccionados = $request->input('tags_id');
    $data = $request->all();
    $atributos = null;

    

    $request->validate([
      'producto' => 'required',
      'precio' => 'required',
      'categoria_id' => 'required'
    ]);

    
    if ($request->hasFile("imagen")) {
      $file = $request->file('imagen');
      $routeImg = 'storage/images/productos/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      $this->saveImg($file, $routeImg, $nombreImagen);

      $data['imagen'] = $routeImg . $nombreImagen;
     
    } 


    if ($request->hasFile("fichatecnica")) {
      $file = $request->file('fichatecnica');
      $routearchive = 'storage/archives/';
      $nombrearchive = Str::random(10) . '_' . $file->getClientOriginalName();
              
      if (!file_exists($routearchive)) {
                  mkdir($routearchive, 0777, true);
              }

              $file->move($routearchive, $nombrearchive);

              $data['url_fichatecnica'] = $routearchive;
              $data['name_fichatecnica'] = $nombrearchive;
    }


    if ($request->hasFile("fichariesgo")) {
      $file = $request->file('fichariesgo');
      $routearchive2 = 'storage/archives/';
      $nombrearchive2 = Str::random(10) . '_' . $file->getClientOriginalName();
              
      if (!file_exists($routearchive2)) {
                  mkdir($routearchive2, 0777, true);
              }

              $file->move($routearchive2, $nombrearchive2);

              $data['url_docriesgo'] = $routearchive2;
              $data['name_docriesgo'] = $nombrearchive2;
    }


    if (isset($data['filesGallery'])) {

      foreach ($data['filesGallery'] as $file) {
      
        [$first, $code] = explode(';base64,', $file);
 
        $imageData = base64_decode($code);

        $routeImg = 'storage/images/gallery/';
        $ext = ExtendFile::getExtention(str_replace("data:", '', $first));
        $nombreImagen = Str::random(10) . '.' . $ext;
        // Verificar si la ruta no existe y crearla si es necesario
        if (!file_exists($routeImg)) {
          mkdir($routeImg, 0777, true); 
        }
        
        // Guardar los datos binarios en un archivo
        file_put_contents($routeImg . $nombreImagen, $imageData);
        $dataGalerie['imagen'] = $routeImg . $nombreImagen;
        $dataGalerie['product_id'] = $product->id;
        // $dataGalerie['type_img'] = 'gall';
        Galerie::create($dataGalerie);
      }
    }



    foreach ($request->all() as $key => $value) {

      if (strstr($key, ':')) {
        // Separa el nombre del atributo y su valor
        $atributos = $this->stringToObject($key, $atributos);
        unset($request[$key]);
      } elseif (strstr($key, '-')) {
        //strpos primera ocurrencia que enuentre
        if (strpos($key, 'tittle-') === 0 || strpos($key, 'title-') === 0) {
          $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
          $especificaciones[$num]['tittle'] = $value; // Agregar el título al array asociativo
        } elseif (strpos($key, 'specifications-') === 0) {

          $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
          $especificaciones[$num]['specifications'] = $value; // Agregar las especificaciones al array asociativo
        }elseif(strpos($key, 'conbinacion-') === 0 ){
           $num = substr($key, strrpos($key, '-') + 1);
           $combinacion = Combinacion::find($num)->update([ 'color_id' => $value["color"] ,
           'talla_id' => $value["talla"] ,
           'stock' => $value["stock"] ,]);

 
        }elseif(strpos($key, 'updateComb-') === 0 ){
          Combinacion::create([
            "product_id" =>$id,
            "color_id" =>$value["color"],
            "talla_id" =>$value["talla"],
            "stock" =>$value["stock"],
          ]);
        }elseif (strpos($key, 'imagenP-') === 0) {
          $colorId = substr($key, strrpos($key, '-') + 1);
          $isCaratula = 0;
          if ($colorId == isset($data['caratula']) && $onlyOneCaratula == false) {
            $isCaratula = 1;
            $onlyOneCaratula = true;
          }
          $file = $request->file($key);
          $routeImg = 'storage/images/productos/';
          $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

          $this->saveImg($file, $routeImg, $nombreImagen);

          $dataGalerie['name_imagen'] = $routeImg . $nombreImagen;
          $dataGalerie['product_id'] = $id;
          $dataGalerie['type_imagen'] = 'primary';
          $dataGalerie['caratula'] = $isCaratula;
          $dataGalerie['color_id'] = $colorId;
          // $dataGalerie['type_img'] = 'gall';

          /* if($cleanGaleria){
            $cleanGaleria = false ; 
            DB::delete('delete from imagen_productos where product_id = ?', [$id]);
          } */
         
          ImagenProducto::create($dataGalerie);
        }elseif(strpos($key, 'attrid-') === 0) {
          $colorId = substr($key, strrpos($key, '-') + 1);
          foreach ($value as $file) {
            $this->GuardarGaleria($file, $id, $colorId);
          }
        }
        
      }
    }

    
    $jsonAtributos = json_encode($atributos);


    if (array_key_exists('destacar', $data)) {
      if (strtolower($data['destacar']) == 'on') $data['destacar'] = 1;
    }
    if (array_key_exists('recomendar', $data)) {
      if (strtolower($data['recomendar']) == 'on') $data['recomendar'] = 1;
    }
    if (array_key_exists('liquidacion', $data)) {
      if (strtolower($data['liquidacion']) == 'on') $data['liquidacion'] = 1;
    }



    $data['atributes'] = $jsonAtributos;
    $cleanedData = Arr::where($data, function ($value, $key) {
      return !is_null($value);
    });
    $cleanedData['description'] = $data['description'];
    $cleanedData['order'] = $data['order'];
    // $cleanedData['especificacion'] = $data['especificacion'];

    // $cleanedData['sku'] = $data['sku'];

    // if ($data['descuento'] == 0 || is_null($data['descuento'])) {
    //   $cleanedData['preciofiltro'] = $data['precio'];
    // } else {
    //   $cleanedData['preciofiltro'] = $data['descuento'];
    // }
    if (!isset($cleanedData['liquidacion']) || $cleanedData['liquidacion'] === '') {
        $cleanedData['liquidacion'] = null;
    }  
    
    $product->update($cleanedData);

    DB::delete('delete from attribute_product_values where product_id = ?', [$product->id]);

    if (isset($atributos)) {
      foreach ($atributos as $atributo => $valores) {
        $idAtributo = Attributes::where('titulo', $atributo)->first();

        foreach ($valores as $valor) {
          $idValorAtributo = AttributesValues::where('valor', $valor)->first();

          if ($idAtributo && $idValorAtributo) {
            DB::table('attribute_product_values')->insert([
              'product_id' => $product->id,
              'attribute_id' => $idAtributo->id,
              'attribute_value_id' => $idValorAtributo->id,
            ]);
          }
        }
      }
    }

    DB::delete('delete from product_xproducts where product_id = ?', [$id]);
    if (!is_null($tagsSeleccionados)) {
      $this->TagsXProducts($id, $tagsSeleccionados);
    }
    $this->actualizarEspecificacion($especificaciones);
    return redirect()->route('products.index')->with('success', 'Producto editado exitosamente.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function borrar(Request $request)
  {
    //softdelete
    DB::delete('delete from galeries where product_id = ?', [$request->id]);

    $product = Products::find($request->id);
    $product->status = 0;
    $product->save();
  }

  public function updateVisible(Request $request)
  { 

    // $cantidad = $this->contardestacados();

    // if($cantidad >= 1 && $request->status == 1){
    //     return response()->json(['message' => 'Solo puedes destacar un producto'], 409 );
    // }

    $id = $request->id;
    $field = $request->field;
    $status = $request->status;

    // Verificar si el producto existe
    $product = Products::find($id);

    if (!$product) {
      return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    // Actualizar el campo dinámicamente
    $product->update([
      $field => $status
    ]);
    return response()->json(['message' => 'registro actualizado']);
  }


  public function contardestacados(){

    $cantidad = Products::where('status', '=', 1)->where('visible', '=', 1)->where('destacar', '=', 1)->count();
    return  $cantidad;
  }


  public function borrarimg(Request $request){
    try {
      //code...
      $imagenGaleria = Galerie::find($request->id);
      $rutaCompleta  = $imagenGaleria->imagen;
      if (file_exists($rutaCompleta)) {
        // Intentar eliminar el archivo
        if (unlink($rutaCompleta)) {
            // Archivo eliminado con éxito
           
        } 
      }
      $imagenGaleria->delete();
      return response()->json(['message'=>'imagen eliminada con exito ']);
    } catch (\Throwable $th) {
      //throw $th;
      return response()->json(['message'=>'no se ha podido eliminar la imagen '], 400);

    }
  }


  public function borrarFichaTecnica(Request $request){
    try {
       
        $obtenerproducto = Products::find($request->id);

        if (!$obtenerproducto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

      
        $rutaCompleta = $obtenerproducto->url_fichatecnica . $obtenerproducto->name_fichatecnica;

      
        if (file_exists($rutaCompleta)) {
            
            if (unlink($rutaCompleta)) {
               
                $obtenerproducto->url_fichatecnica = "";
                $obtenerproducto->name_fichatecnica = "";
                $obtenerproducto->update();
                
                return response()->json(['message' => 'Ficha Técnica eliminada con éxito']);
            } else {
                return response()->json(['message' => 'No se pudo eliminar el archivo físico'], 500);
            }
        } else {
            return response()->json(['message' => 'El archivo no existe'], 404);
        }

    } catch (\Throwable $th) {
        return response()->json(['message' => 'No se ha podido eliminar la Ficha Técnica', 'error' => $th->getMessage()], 400);
    }
}


  public function borrarHojaSeguridad(Request $request){
    try {
       
      $obtenerproducto = Products::find($request->id);

      if (!$obtenerproducto) {
          return response()->json(['message' => 'Producto no encontrado'], 404);
      }

    
      $rutaCompleta = $obtenerproducto->url_docriesgo . $obtenerproducto->name_docriesgo;

    
      if (file_exists($rutaCompleta)) {
          
          if (unlink($rutaCompleta)) {
             
              $obtenerproducto->url_docriesgo = "";
              $obtenerproducto->name_docriesgo = "";
              $obtenerproducto->update();
              
              return response()->json(['message' => 'Hoja de seguridad eliminada con éxito']);
          } else {
              return response()->json(['message' => 'No se pudo eliminar el archivo físico'], 500);
          }
      } else {
          return response()->json(['message' => 'El archivo no existe'], 404);
      }

  } catch (\Throwable $th) {
      return response()->json(['message' => 'No se ha podido eliminar la Hoja de seguridad', 'error' => $th->getMessage()], 400);
  }

}

}
