<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;  
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['rollno', 'name', 'parents_mobile_no', 'class']; 
    

    public function studentMarks(){
        return $this->hasMany(studentMarks::class, 'student_id', 'id');
    }
}
