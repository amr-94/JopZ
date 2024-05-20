<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['jop_id', 'from_user_id', 'to_user_id', 'comment', 'file', 'title'];

    /**
     * Get the from_user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id');
    }

    /**
     * Get the to_user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }

    /**
     * Get the jop that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jop(): BelongsTo
    {
        return $this->belongsTo(Jop::class, 'jop_id', 'id');
    }
}