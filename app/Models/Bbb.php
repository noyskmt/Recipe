<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbb extends Model
{
    use HasFactory;

    protected $table = "bbb";

    protected $guarded = ['id'];

}
