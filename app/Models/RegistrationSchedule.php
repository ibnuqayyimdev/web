<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSchedule extends Model
{
    use HasFactory;

    const BATCH = [
        1 => 'Pertama',
        2 => 'Kedua',
        3 => 'Ketiga',
        4 => 'Keempat',
        5 => 'Kelima',
    ];

    public function getBatchAttribute($value) {
        return self::BATCH[$value];
    }
}
