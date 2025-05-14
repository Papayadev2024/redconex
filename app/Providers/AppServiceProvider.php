<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\General;
use App\Models\LibroReclamaciones;
use App\Models\Message;
use App\Models\ClaimOsiptel;
use App\Models\ComplaintOsiptel;
use App\Models\AppealOsiptel;
use App\Models\PolyticsCondition;
use App\Models\TermsAndCondition;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.public.footer', function ($view) {
            // Obtener los datos del footer
            $general = General::all(); // Suponiendo que tienes un modelo Footer y un método footerData() en él
            // Pasar los datos a la vista
            $politicDev = PolyticsCondition::first();
            $termsAndCondicitions = TermsAndCondition::first();
            // $view->with('general', $general)
            //     ->with('politicDev', $politicDev)
            //     ->with('termsAndCondicitions', $termsAndCondicitions);

            $view->with(['general' => $general, 'politicDev' => $politicDev, 'termsAndCondicitions' => $termsAndCondicitions]);
        });

        View::composer('components.public.header', function ($view) {
            // Obtener los datos del footer
            $submenucategorias = Category::all(); // Suponiendo que tienes un modelo Footer y un método footerData() en él
            $submenucolecciones = Collection::all();
            $general = General::all();
            // Pasar los datos a la vista
            $view->with('submenucategorias', $submenucategorias)
                 ->with('submenucolecciones', $submenucolecciones)
                 ->with('general', $general);
        });

        View::composer('components.public.matrix', function ($view) {
              
            $general = General::all();
            // Pasar los datos a la vista
            $view->with('general', $general);
        });

        View::composer('components.app.sidebar', function ($view) {
           
            $reclamo =  LibroReclamaciones::where('is_read', '!=', 1)->where('status', '!=', 0)->count();
            
            $mensajes = Message::where('is_read', '!=', 1 )->where('status', '!=', 0)
                                    ->where(function($query) {
                                        $query->where('source', '=', 'Inicio')
                                            ->orWhere('source', '=', 'Contacto')
                                            ->orWhere('source', '=', 'WSP - Tratamiento de Agua')
                                            ->orWhere('source', '=', 'WSP - Productos Químicos');
                                    })->count(); 
                                    
            $mensajeslanding = Message::where('is_read', '!=', 1 )->where('status', '!=', 0)
                                        ->whereNotIn('source',  ['Inicio', 'Contacto', 'Producto', 'WSP - Productos Químicos','WSP - Tratamiento de Agua'])
                                        ->count();

            $mensajesproduct = Message::where('is_read', '!=', 1 )->where('status', '!=', 0)
                                        ->where('source', '=', 'Producto')
                                        ->count();
            
            $mensajesclaim = ClaimOsiptel::where('is_read', '!=', 1 )->count();                          
            $mensajescomplaint = ComplaintOsiptel::where('is_read', '!=', 1 )->count();                          
            $mensajesappeal = AppealOsiptel::where('is_read', '!=', 1 )->count();                          
                                        
                                        
            // Pasar los datos a la vista
            $view->with('mensajes', $mensajes)
                 ->with('mensajeslanding', $mensajeslanding)
                 ->with('reclamo', $reclamo)
                 ->with('mensajesclaim', $mensajesclaim)
                 ->with('mensajescomplaint', $mensajescomplaint)
                 ->with('mensajesappeal', $mensajesappeal)
                 ->with('mensajesproduct', $mensajesproduct);
        });

         PaginationPaginator::useTailwind();   
    }
}
