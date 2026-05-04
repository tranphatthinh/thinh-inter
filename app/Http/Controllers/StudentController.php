<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function index()
    {
        //
        return Student::all();
    }

    public function store(Request $request)
    {
        try {
        $data = $request->validate([
            'masinhvien'=> 'required|string|max:50|unique:students',
            'tensinhvien'=> 'required|string|max:255',
            'email'=> 'required|email|max:50|unique:students'
        ],
        [
            'masinhvien.required'=> 'masv khong duoc de trong',
            'masinhvien.unique' => 'ma da ton tai',

            'tensinhvien.required'=> 'ten khong duoc de trong',
            
            'email.required'=> 'email khong duoc de trong',
            'email.email'=>'email khong dung dinh dang',
            'email.unique'=> 'email da ton tai'
        ]);

        $sinhvien = Student::create($data);
            return response()->json([
                'message'=> 'da them thanh cong',
                'data'=> $sinhvien
            ],201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Lỗi',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show($id)
    {
        return  Student::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $sinhvien = Student::findOrFail($id);
        
    try{
        $data = $request->validate([
            'masinhvien'=> 'sometimes|string|max:50|unique:students,masinhvien,'. $id,
            'tensinhvien'=>'sometimes|string|max:255',
            'email'=>'sometimes|email|max:50|unique:students,email,'. $id
        ],
        [
            'email.email'=>'email khong dung dinh dang',

            'masinhvien.unique' =>'ma da ton tai',
            'email.unique'=>'email da ton tai'
        ]
    );
        $sinhvien->update($data);
        return response()->json([
            'message'=> 'cap nhat thanh cong',
            'data'=> $sinhvien
        ]);
    }catch (ValidationException $e) {
            return response()->json([
                'message' => 'Lỗi',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'xoa thanh cong'
        ]);
    }
}
