<?php
// Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function todo(): BelongsTo
    {
        return $this->belongsTo(Todo::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

