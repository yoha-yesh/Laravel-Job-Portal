<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaraJobs extends Model
{
    use HasFactory;

    public function filterJobs($query ,array $filters){
        if($filters['tag']){
            $query->where('tags', 'like', '%'.request('tag'). "%");
        

    }
}

    protected $fillable =[
        'title',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'description'

    ];
}
