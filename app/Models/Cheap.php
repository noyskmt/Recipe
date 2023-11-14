<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheap extends Model
{
    use HasFactory;

    protected $table = "Cheaps";

    protected $guarded = ['id'];
}
