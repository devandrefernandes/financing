<?php

namespace App\Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $hidden = [
      'id',
      'created_at',
      'updated_at',
      'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'image_url'
    ];
}
