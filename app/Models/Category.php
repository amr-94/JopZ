<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
        'parent_id',
        'user_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class,  'parent_id');
    }
    /**
     * Get all of the jops for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jops(): HasMany
    {
        return $this->hasMany(Jop::class);
    }

    /**
     * Get the user that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public static function booted()
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
            $category->user_id = Auth::user()->id;
        });
    }
}