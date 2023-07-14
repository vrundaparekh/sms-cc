<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\Student as ResourcesStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    { 
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            if ($validator->fails()) {
                return response(['status' => false, 'message' => "Invalid data", 'error' => $validator->errors()], 422);
            }
            $student = Student::where('email',$request->email)->first();
                if($student){
                    if (Hash::check($request->password, $student->password)){
                        $response['user'] = Auth::user();
                        $student = Student::where('email', $request->email)->first();
                        $response['token'] = $student->createToken('api-application')->accessToken;
                        return response(['status' => true, 'message' => 'You Have Successfully Logged in.',  'token' => $response['token']], 200);
                    }
            }

            return response(['status' => false, 'message' => 'These credentials do not match with our records.'], 422);
        } catch (\Exception $e) {
            Log::error($e);
            return response(['status' => false, 'message' => 'Oops something went wrong.'], 500);
        }
    }
    public function getStudents()
    {
        try {
            $student_id =  Auth::user()->id;
                return response(new ResourcesStudent($student_id));
        } catch (\Exception $e) {
            Log::error($e);
            return response(['status' => false, 'message' => 'Oops something went wrong.'], 500);
        }
    }
    public function getAllStudent()

    {
        try {
                $students = Student::with('studentMarks')->get();
                if ($students) {
                    return response(['status' => true, 'data' => $students]);
                } else
                    return response(['status' => false, 'message' => 'record not found']);
        } catch (\Exception $e) {
            Log::error($e);
            return response(['status' => false, 'message' => 'Oops something went wrong'], 500);
        }

    }
}
