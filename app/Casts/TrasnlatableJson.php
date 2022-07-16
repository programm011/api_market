<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class TrasnlatableJson implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return $value ? self::translatable($value, config('app.locale')) : null;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value);
    }

    public static function translatable($attribute, $key = null)
    {
        $arr = json_decode($attribute, true);
        return $arr[$key] ?? $arr[config('app.locale')] ?? "";
    }
}
