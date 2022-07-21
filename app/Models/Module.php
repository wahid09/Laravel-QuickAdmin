<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true);
    }

    public function format()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_bn' => $this->name_bn,
            'is_active' => $this->is_active == 1 ? 'Active' : "Inactive",
            'created_at' => $this->created_at->diffForHumans(),
            'created_at' => $this->updated_at->diffForHumans()
        ];
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
