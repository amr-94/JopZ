<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jopform extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'jop_id', 'message', 'email', 'phone', 'cv'];

    /**
     * Get the user that owns the Jopform
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the jop that owns the Jopform
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jop(): BelongsTo
    {
        return $this->belongsTo(Jop::class);
    }
}