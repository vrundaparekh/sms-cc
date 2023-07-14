<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'english', 'maths', 'science', 'hindi', 'computer', 'total', 'grade', 'percentage'];
}
