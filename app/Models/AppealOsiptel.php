<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppealOsiptel extends Model
{
    use HasFactory;

    protected $fillable = [
        'project', 'name_dad', 'name_mom', 'birthay', 'address_birthay',
        'type_person', 'role', 'type_document', 'doc_number', 'name_titular', 
        'lastname_titular', 'ruc', 'name_business', 'address_dep', 'address_prov', 
        'address_district', 'adress_location', 'code_service', 'type_document_legal', 
        'doc_number_legal', 'name_legal', 'lastname_legal', 'address_email', 
        'phone_mobile', 'doc_archive', 'archive_path', 'notification', 
        'address_email_noti', 'address_dep_noti', 'address_prov_noti', 
        'address_district_noti', 'address_location_noti', 'address_reference_noti', 
        'claim_issue', 'claim_issue_second', 'amount_claim', 'number_recibe', 
        'date_emision', 'date_finish', 'claim', 'doc_aditional', 'archive_aditional_path',
        'status', 'claim_number','complaint_number','appeal_number', 'resolution', 'is_read'
    ];

    protected $casts = [
        'doc_archive' => 'boolean',
        'notification' => 'boolean',
        'doc_aditional' => 'boolean',
        'birthay' => 'date',
        'date_emision' => 'date',
        'date_finish' => 'date',
        'amount_claim' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->appeal_number = 'APPEAL-' . strtoupper(uniqid());
        });
    }

}
