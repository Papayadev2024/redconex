<?php

namespace Database\Seeders;

use App\Models\ContactoView;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactoViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactoView::updateOrCreate([
            'id' => 1
        ],[

            'subtitle1section' => 'Contacto',
            'title1section' => 'Tienes dudas? Pongase en',
            'title1section2' => 'contacto',

            'title2section' => '¿Quieres contactar con nosotros directamente?',
            'description2section' => 'Nullam vehicula lobortis mauris vel finibus. Nulla et auctor augue. Cras ex tortor, suscipit vel egestas non, malesuada dictum nisl.',
            
            'title3section' => 'Revisa nuestras', 
            'title3section2' => 'preguntas frecuentes',
          

        ]);
    }
}
