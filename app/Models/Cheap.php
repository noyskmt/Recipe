<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cheap extends Model
{
    use HasFactory;

    protected $table = "cheaps";
    
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        "updated_at",
        'deleted_at',
    ];

    protected $primaryKeys = [
        'shop_id',
        'food_id',
    ];

    public function shop(): BelongsTo {
        return $this->belongsTo('App\Models\Shop')->withTimestamps();
    }

    public function food(): BelongsTo {
        return $this->belongsTo('App\Models\Food')->withTimestamps();
    }

}
