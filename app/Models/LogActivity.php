<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogActivity extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true);
    }
}
