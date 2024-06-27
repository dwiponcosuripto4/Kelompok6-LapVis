<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'title',
    //      'description',
    //     'user_id',
    //     'category_id',
    //     'is_complete',
    // ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
