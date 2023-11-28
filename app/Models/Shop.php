<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = "shops";

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        "updated_at",
        'deleted_at',
    ];
}
