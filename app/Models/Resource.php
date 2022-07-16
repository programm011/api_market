<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\URL;

class Resource extends Model
{
    protected $fillable = [
        'additional_identifier',
        'type',
        'path',
        'resource'
    ];

    protected $hidden = ['additional_identifier', 'resource_type', 'resource_id', 'created_at', 'updated_at'];


    public function getPathAttribute(): ?string
    {
        return URL::to($this->path);
    }

    /**
     * @return MorphTo
     */
    public function resource(): MorphTo
    {
        return $this->morphTo();
    }
}
