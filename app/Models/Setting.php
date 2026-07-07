<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'hero_title',
        'hero_subtitle',
        'bio',
        'email',
        'phone',
    ];

    public $timestamps = false;

    public static function current()
    {
        return self::firstOrCreate([], [
            'site_title' => 'Il mio Portfolio',
            'hero_title' => 'Il tuo Nome',
            'hero_subtitle' => 'Scrittore e copywriter',
            'bio' => '',
            'email' => '',
            'phone' => '',
        ]);
    }
}
