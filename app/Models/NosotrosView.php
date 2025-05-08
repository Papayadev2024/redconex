<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NosotrosView extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'subtitle1section',
        'title1section', 
        'title1section2', 
        'description1section', 

        'title2section',
        'subtitle2section',
        'url_image2section',
        'link2section',
        
        'title3section',
        'subtitle3section',
        'url_image3section',
        'link3section',

        'subtitle4section',
        'title4section', 
        'title4section2', 
        'description4section', 

        'subtitle5section',
        'title5section',
        'description5section',
        'url_image5section',

        'title6section',
        'description6section',
        'url_image6section',

        'title7section',
        'description7section',
        'url_image7section',

    ];
}
