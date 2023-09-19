<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbb extends Model
{
    use HasFactory;

    protected $table = "bbb";

    protected $fillable = [
        'name',
        'price',
        'remarks',
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
        'shop_id',
        'food_id'
    ];

}
