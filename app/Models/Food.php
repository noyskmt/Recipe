<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = "foods";

    protected $fillable = ['name'];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
        'categories'
    ];
}
