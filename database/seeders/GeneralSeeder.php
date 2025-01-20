<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\General;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        General::create([
            'address' => 'Ventanilla',
            'inside' => 'Mz. G1 Lt. 16',
            'district' => 'Mi Perú',
            'schedule' => "De Lunes a Viernes de 9:00am a 6:00pm y Sábados de 9:00am a 1:00pm",
            'city' => 'Lima',
            'country' => 'Perú',
            'cellphone' => '+51902556583' ,
            'office_phone' => '01-6556922' ,
            'email' => 'ventas@redconex.pe',
            'facebook' => 'https://www.facebook.com/REDCONEXCONTIGO',
            'instagram' => 'https://www.instagram.com/redconexcontigo?igsh=MWFpYWpnNmM3cHVleQ%3D%3D&utm_source=qr',
            'youtube' => '',
            'twitter' => '',
            'tiktok' => 'https://www.tiktok.com/@redconex.peru?_t=ZM-8t9PHlaLJcD&_r=1',
            'linkedin' => '',
            'whatsapp' => '+51902556583' ,
            'form_email' => 'ventas@redconex.pe',
            'business_hours' => 'horas',
            'mensaje_whatsapp' => 'Hola estamos atentos a lo que ud desee',
            'aboutus' => ''

        ]);
    }
}
