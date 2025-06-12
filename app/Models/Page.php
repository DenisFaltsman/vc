<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    public function viewers()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot('viewed_at');
    }
}
