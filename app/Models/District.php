<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    
    protected $fillable = [     
        'id',   
        'province_id',
        'description',
        'active',
    ];

    protected $keyType = 'string';
    public $incrementing = false;
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
