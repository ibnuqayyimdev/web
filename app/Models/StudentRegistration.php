<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    const STATUS = [
        'PENDING' => 0,
        'PROCESS' => 1,
        'NOT_ACCEPTED' => 2,
        'ACCEPTED' => 3,
    ];

    public function attachments(){
        return $this->hasMany(StudentAttachment::class,'register_id','id');
    }
}
