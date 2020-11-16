<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $dates = [
        'createde_at',
        'updated_at',
        'deleted_at'
    ];

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
}
