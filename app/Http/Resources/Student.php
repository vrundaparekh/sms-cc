<?php

namespace App\Http\Resources;

use App\Models\Student as ModelsStudent;
use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    protected $studentId;
    public function __construct($studentId)
    {
        $this->studentId = $studentId;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $student = ModelsStudent::with('studentMarks')->where('id',$this->studentId)->first();
        return [
            'id' => $student['id'],
            'rollno' => $student['rollno'],
            'student_name' => $student['name'],
            'contact_no' => $student['parents_mobile_no'],
            'class' => $student['class'],
            'percentage' => $student['studentMarks'][0]['percentage'],
            'grade' => $student['studentMarks'][0]['grade'],
        ];
        
        // return parent::toArray($request);
    }
}
