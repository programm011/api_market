<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Product extends Model
{
    use HasFactory;

    public const PRODUCT_MAIN_IMAGE_RESOURCES = 'PRODUCT_MAIN_IMAGE_RESOURCES';
    public const PRODUCT_VIDEO_RESOURCES = 'PRODUCT_VIDEO_RESOURCES';
    public const PRODUCT_IMAGES_RESOURCES = 'PRODUCT_IMAGES_RESOURCES';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function mainImage(): MorphOne
    {
        return $this->morphOne(Resource::class, 'resource')->where('additional_identifier', self::PRODUCT_MAIN_IMAGE_RESOURCES);
    }

    public function video(): MorphOne
    {
        return $this->morphOne(Resource::class, 'resource')->where('additional_identifier', self::PRODUCT_VIDEO_RESOURCES);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Resource::class, 'resource')->where('additional_identifier', self::PRODUCT_IMAGES_RESOURCES);
    }
}
