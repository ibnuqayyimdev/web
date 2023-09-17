<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    const STATUS = [
        'NEW' => 0,
        'PASSED' => 1,
        'REVISED' => 2,
        'PENDING' => 3,
        'NOT_PASSED' => 4
    ];

    public function registrationSchedule(){
        return $this->belongsTo(RegistrationSchedule::class,'registration_schedule_id','id');
    }

    public function attachments(){
        return $this->hasMany(StudentAttachment::class,'register_id','id');
    }

    public function getStatusNameAttribute(){
        return array_flip(self::STATUS)[$this->attributes['status']];
    }

}
