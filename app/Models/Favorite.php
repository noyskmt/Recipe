<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Favorite extends Model
{
    use HasFactory;

    protected $table = "favorites";

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        "updated_at",
        'deleted_at',
    ];

    public function cheap(): HasOne {
        return $this->hasOne('App\Models\User');
    }
}
