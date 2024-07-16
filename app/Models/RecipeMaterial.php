<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeMaterial extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "recipe_materials";

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'name_hiragana',
    ];

    protected $hidden = [
        'created_at',
        "updated_at",
        'deleted_at',
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_recipe_material', 'recipe_material_id', 'recipe_id');
    }
}

