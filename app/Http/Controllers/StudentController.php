<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function insert(Request $request)
    {
        $data = $request->all();
        if ($file = $request->file('file')) {
            $fileName = time() . '' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $fileName, 'public');
            $data['image'] = $filePath;
        }

        $student = Student::create($data);

        return response()->json(['name' => $student->name]);
    }

    public function index()
    {
        $data = Student::all();

        return response()->json(['student' => $data]);
    }

    public function view()
    {
        return view('student.index');
    }
}
