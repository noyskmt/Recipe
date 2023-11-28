<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = "foods";

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        "updated_at",
        'deleted_at',
    ];
}
