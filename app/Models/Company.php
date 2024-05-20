<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'logo',
        'slug',
        'website',
        'email',
        'phone',
        'address',
        'user_id',
        'deleted_at',
        'description'

    ];

    /**
     * Get all of the jops for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jops(): HasMany
    {
        return $this->hasMany(Jop::class);
    }

    /**
     * Get the user that owns the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public static function booted()
    {
        static::creating(function ($company) {
            $company->slug = Str::slug($company->name);
            $company->user_id = Auth::user()->id;
        });
    }
}