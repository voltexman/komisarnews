<?php

namespace App\Models;

use App\Enums\PostCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\CropPosition;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasTags;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $casts = [
        'category' => PostCategories::class,
        'is_published' => 'bool',
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'slug',
        'body',
        'category',
        'is_published',
        'published_at',
    ];

    const PUBLISHED = 1;

    const HIDDEN = 0;

    const INDEXING = 1;

    const NO_INDEXING = 0;

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('admin')
            ->width(320)
            ->height(240)
            ->nonOptimized();

        $this->addMediaConversion('preview')
            ->crop(640, 480, CropPosition::Center)
            ->format('webp');

        $this->addMediaConversion('header')
            ->crop(1920, 280, CropPosition::Center)
            ->format('webp');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', self::PUBLISHED)
            ->where('published_at', '<=', now());
    }
}
