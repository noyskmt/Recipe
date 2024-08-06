<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Food extends Model
{
    use HasFactory;

    protected $table = "food";

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        "updated_at",
        'deleted_at',
    ];

    public function cheaps(): HasOne {
        return $this->hasOne('App\Models\Cheap');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($food) {
    //         $food->name_hiragana = self::convertToHiragana($food->name);
    //     });

    //     static::updating(function ($food) {
    //         $food->name_hiragana = self::convertToHiragana($food->name);
    //     });
    // }

    // // ひらがなへの変換を行うメソッド（例として）
    // private static function convertToHiragana($string)
    // {
    //     // ここにひらがな変換のロジックを追加します
    //     // 今回は単純な例としてそのまま返すことにしていますが、実際には変換ライブラリやAPIを使うことが考えられます
    //     return $string; // 例: mb_convert_kana($string, 'c', 'UTF-8');
    // }
}
