<?php

namespace Database\Seeders;

use App\Models\HomeView;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeView::updateOrCreate([
            'id' => 1
        ],[
            'subtitle1section' => '100%',
            'title1section' => 'Red fibre optica',

            'subtitle2section' => '24/7',
            'title2section' => 'Atención permanente',

            'subtitle3section' => 'Llámanos al',
            'title3section' => 'y escoge tu plan ahora',

            'title4section' => '¿Eres cliente Redconex?',

            'subtitle5section' => 'Descrubre tu Plan Ideal',
            'title5section' => 'Elige el',
            'title5section2' => 'Plan de Internet',
            'title5section3' => 'que se Ajusta a Ti',

            'subtitle6section' => 'Zonas de Cobertura',
            'title6section' => 'Conoce las',
            'title6section2' => 'areas con nuestra conexión',
            'title6section3' => 'de alta velocidad.',

            'subtitle7section' => 'Sobre Nosotros',
            'title7section' => '¡Conéctate al Futuro con',
            'title7section2' => 'Red Conex.',
            'title7section3' => 'La Mejor Velocidad en Internet que Puedes Imaginar!',
            'description7section' => '¡Bienvenido a Red Conex, tu mejor aliado para una conexión de internet inigualable! Con más de [número de años en el mercado] años de experiencia, estamos aquí para transformar tu experiencia digital con planes de internet de alta velocidad que se adaptan a ti.',

            'title8section' => '¡Los Mejores',
            'title8section2' => 'Planes de Internet',
            'title8section3' => 'para Tu Hogar Te Esperan!',

            'subtitle9section' => '¡Se parte de la experiencia Red Conex!',
            'title9section' => '¡Déjanos tu correo y recibe la mejor info!',
            'url_9section' => '/',

            'subtitle10section' => 'Nuestras últimas',
            'title10section' => 'publicaciones',

            'subtitle11section' => 'Todo lo que debes saber de',
            'title11section' => 'nuestros planes',
          
        ]);
    }
}
