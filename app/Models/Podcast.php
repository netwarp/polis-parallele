<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $table = 'podcasts';

    protected $fillable = [
        'title',
        'src',
        'description'
    ];
}
