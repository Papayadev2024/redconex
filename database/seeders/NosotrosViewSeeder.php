<?php

namespace Database\Seeders;

use App\Models\NosotrosView;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NosotrosViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NosotrosView::updateOrCreate([
            'id' => 1
        ],[
            'subtitle1section' => 'Nosotros',
            'title1section' => 'Conexión que',
            'title1section2' => 'Te Impulsa',
            'description1section' => 'Ofrecemos internet rápido y confiable para hogares y empresas, con planes flexibles y soporte dedicado. Mejora tu conexión con velocidades que se adaptan a tus necesidades y disfruta de una experiencia sin interrupciones.',

            
            'title2section' => '100%',
            'subtitle2section' => 'Red fibra óptica',
            'url_image2section' => '',

            'title3section' => '24/7',
            'subtitle3section' => 'Atención permanente',
            'url_image3section' => '',

            'subtitle4section' => 'Valores',
            'title4section' => 'Conexión con Propósito:',
            'title4section2' => 'Nuestros Valores',
            'description4section' => 'Nos impulsan valores que reflejan nuestro compromiso de ofrecer la mejor experiencia de conexión para nuestros clientes, guiados siempre por la innovación y el servicio de calidad.',

            'subtitle5section' => 'Nosotros',
            'title5section' => 'Nuestra *Historia*',
            'description5section' => '<p>En un mundo donde la distancia separa y las oportunidades no siempre llegan a todos, RedConex nació con un propósito claro: llevar internet a quienes más lo necesitan, cerrando brechas, impulsando sueños y conectando familias.</p>
            <p>No queríamos que la tecnología fuera solo para unos pocos, sino una herramienta de igualdad. Desde el principio, supimos que una conexión no es solo tecnología; es educación, trabajo, familia y oportunidades. </p>',
            'url_image5section' => '',

            'title6section' => 'Nuesta *misión*',
            'description6section' => 'En Redconex, llevamos la mejor experiencia digital a cada hogar, brindando internet de fibra óptica de alta calidad a un costo accesible para todas las familias. Nos comprometemos con una atención cercana y respetuosa, asegurando un soporte técnico veloz y eficiente, porque más que conectar dispositivos, conectamos personas y sus sueños.',
            'url_image6section' => '',

            'title7section' => 'Nuestras *visión*',
            'description7section' => 'Ser una empresa líder en el mercado nacional, destacando por brindar un servicio de excelencia, impulsado por tecnología de vanguardia. Queremos estar siempre a la altura de la innovación, para que cada persona, sin importar dónde esté, tenga acceso a una conexión confiable, rápida y de calidad.',
            'url_image7section' => '',

        ]);
    }
}
