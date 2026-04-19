<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    // GET all
    public function index()
    {
        return Student::all();
    }

    // CREATE
    public function store(Request $request)
    {
        return Student::create($request->all());
    }

    // GET 1
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return $student;
    }

    // DELETE
    public function destroy($id)
    {
        Student::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
