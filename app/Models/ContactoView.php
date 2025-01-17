<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoView extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'subtitle1section', 
        'title1section', 
        'title1section2', 
       
        'title2section',
        'description2section',
        
        'title3section',
        'title3section2',

    ];
}
