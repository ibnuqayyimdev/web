<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RegistrationSchedule extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'type',
        'start_date',
        'end_date',
        'period',
        'batch',
        'registration_fee',
        'extra_attributes',
    ];

    public static function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:0,1',
            'type' => 'required|in:1,2',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'period' => 'required|string|max:255',
            'batch' => 'required|integer',
            'registration_fee' => 'required|numeric'
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
