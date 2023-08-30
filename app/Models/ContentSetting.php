<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSetting extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'extra_attributes', 'status'];

    public function getTypeNameAttribute()
    {
        return $this->attributes['type'] === 1 ? 'ACTIVE' : 'NON ACTIVE';
    }
}
