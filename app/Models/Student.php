<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['name', 'user_id', 'grade', 'admission_number', 'email','address', 'phone', 'active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function onClasses()
    {
        return $this->belongsToMany(OnClass::class, 'student_on_class', 'student_id', 'on_class_id');
    }
}
