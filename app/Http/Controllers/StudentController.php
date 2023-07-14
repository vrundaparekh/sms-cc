<?php

namespace App\Http\Controllers;

use App\Http\Resources\Student as ResourcesStudent;
use App\Imports\ImportStudentMarksheet;
use App\Models\Student;
use App\Models\StudentMarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    //
    public function index(){
        return view('student.create');
    }
    public function studentStore(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'rollno' => 'required|numeric|unique:students',
                'name' => 'required|string',
                'parents_mobile_no' => 'required|numeric|unique:students',
                'class' => 'required',
                'email' => 'required|email|unique:students',
                'password' => 'required|min:8',
                'file' => 'required|file|mimes:csv,txt,text',
            ]);
            if ($validator->fails()) {
                return response(['status' => false, 'message' => 'Invalid data', 'error' => $validator->errors()], 422);
            }
            $student = new Student();
            $student->rollno = $request->rollno;
            $student->name = $request->name;
            $student->parents_mobile_no = $request->parents_mobile_no;
            $student->class = $request->class;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->save();
            $id = $student->id;
            Excel::import(new ImportStudentMarksheet, $request->file('file')->store('files'));
            $studentMarks = StudentMarks::latest()->first();
            $total = StudentMarks::where('id', $studentMarks->id)
                ->value(DB::raw("SUM( english + maths + science + hindi + computer)"));
            $percentage = $total / 500 * 100;
            $grade = Grade($percentage);
            $studentMarks = StudentMarks::where('id',$studentMarks->id)->update(['student_id' => $id, 'total' => $total, 'percentage' => $percentage, 'grade' => $grade ]);
            
            return response(['status' => true, 'message' => 'Student record successfully saved.'], 200);
        } catch (\Exception $e) {
            Log::error($e);
            return response(['status' => false, 'message' => 'Oops something went wrong'], 500);
        }

    }
   
    public function studentShow(){
        return view('student.view');
    }
    
}
    

