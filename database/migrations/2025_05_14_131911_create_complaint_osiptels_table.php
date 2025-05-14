<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaint_osiptels', function (Blueprint $table) {
            $table->id();

            // Paso 1 - Tipo de servicio y verificación
            $table->string('project')->nullable();
            $table->string('name_dad')->nullable();
            $table->string('name_mom')->nullable();
            $table->date('birthay')->nullable();
            $table->string('address_birthay')->nullable();
            
            // Paso 2 - Condición del reclamante
            $table->string('type_person')->nullable();
            $table->string('role')->nullable();
            
            // Datos del titular (persona natural)
            $table->string('type_document')->nullable();
            $table->string('doc_number')->nullable();
            $table->string('name_titular')->nullable();
            $table->string('lastname_titular')->nullable();
            
            // Datos del titular (persona jurídica)
            $table->string('ruc')->nullable();
            $table->string('name_business')->nullable();
            
            // Dirección de instalación
            $table->string('address_dep')->nullable();
            $table->string('address_prov')->nullable();
            $table->string('address_district')->nullable();
            $table->string('adress_location')->nullable();
            $table->string('code_service')->nullable();
            
            // Datos del reclamante/representante legal
            $table->string('type_document_legal')->nullable();
            $table->string('doc_number_legal')->nullable();
            $table->string('name_legal')->nullable();
            $table->string('lastname_legal')->nullable();
            $table->string('address_email')->nullable();
            $table->string('phone_mobile')->nullable();
            
            // Documento adjunto
            $table->boolean('doc_archive')->default(false);
            $table->string('archive_path')->nullable();
            
            // Datos para notificación
            $table->boolean('notification')->default(false);
            $table->string('address_email_noti')->nullable();
            $table->string('address_dep_noti')->nullable();
            $table->string('address_prov_noti')->nullable();
            $table->string('address_district_noti')->nullable();
            $table->string('address_location_noti')->nullable();
            $table->string('address_reference_noti')->nullable();
            
            // Datos del reclamo
            $table->string('claim_issue')->nullable();
            $table->string('claim_issue_second')->nullable();
            $table->decimal('amount_claim', 10, 2)->nullable();
            $table->string('number_recibe')->nullable();
            $table->date('date_emision')->nullable();
            $table->date('date_finish')->nullable();
            $table->text('claim')->nullable();
            
            // Documento adicional
            $table->boolean('doc_aditional')->default(false);
            $table->string('archive_aditional_path')->nullable();
            
            // Estado y seguimiento
            $table->string('status')->default('pendiente');
            $table->string('claim_number')->nullable();
            $table->string('complaint_number')->nullable();
            
            $table->boolean('is_read')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_osiptels');
    }
};
