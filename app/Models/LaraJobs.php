<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaraJobs extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'tags',
        'comapny',
        'location',
        'email',
        'website',
        'description'

    ];
}
