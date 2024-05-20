<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Jop extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'type',
        'tags',
        'status',
        'category_id',
        'company_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Jop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the company that owns the Jop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get all of the comments for the Jop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public static function booted()
    {
        static::creating(function ($jop) {
            $jop->slug = Str::slug($jop->name);
            $jop->user_id = Auth::user()->id;
        });
    }
}
