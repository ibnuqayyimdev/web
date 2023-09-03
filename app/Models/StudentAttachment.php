<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    const TYPE = [
        'PHOTO' => 1001,
        'KTP' => 1002,
        'IJASAH_SKL' => 1003,
    ];

    public function getStatusNameAttribute()
    {
        return array_flip(Helper::STATUS)[$this->attributes['status']];
    }
}
