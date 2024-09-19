<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'recipeTitle',
        'recipeUrl',
        'mediumImageUrl',
        'recipeIndication',
    ];

    public function materials()
    {
        return $this->belongsToMany(RecipeMaterial::class, 'recipe_recipe_material', 'recipe_id', 'recipe_material_id');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
