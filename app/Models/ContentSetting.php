<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSetting extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'extra_attributes', 'status'];

    const TYPE = [
        'BACKSITE' => 0,
        'FRONTSITE' => 1,
    ];



    const FRONTSITE_SECTION = [
        'feature-service-section',
        'cta-section',
        'about-section',
        'count-section',
        'feature-section',
        'fasility-section',
        'activity-section',
        'testimonial-section',
        'teacher-section',
        'gallery-section',
        'faq-section',
        'contact-section'
    ];

    public function getTypeNameAttribute()
    {
        return array_flip(self::TYPE)[$this->attributes['type']];
    }

    public function getStatusNameAttribute()
    {
        return array_flip(Helper::STATUS)[$this->attributes['status']];
    }
}
