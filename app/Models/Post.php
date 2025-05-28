<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, HasSlug;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'cover_image',
        'user_id',
        'category_id',
    ];

    protected $with = ['user', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class, 'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'post_id');
    }

    #[Scope]
    protected function filter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('name', $category);
            });
        });

        $query->when($filters['user'] ?? false, function ($query, $user) {
            return $query->whereHas('user', function (Builder $query) use ($user) {
                $query->where('name', $user);
            });
        });
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs()
            ->usingSeparator('-');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
