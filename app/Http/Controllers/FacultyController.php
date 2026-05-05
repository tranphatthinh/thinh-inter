<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Dotenv\Store\File\Reader;
use Illuminate\Validation\ValidationException;

class FacultyController extends Controller
{
    //
    public function index()
    {
        return Faculty::all();
    }

    public function store(Request $request)
    {
        try{
        $data = $request->validate([
            'makhoa'=> 'required|string|max:255|unique:faculties',
            'tenkhoa'=> 'required|string|max:255'
        ],
        [
            'makhoa.required'=> 'makhoa khong duoc de trong',
            'makhoa.unique' => 'ma da ton tai',

            'tenkhoa.required'=> 'ten khong duoc de trong',
        ]
    );
        $khoa = Faculty::create($data);
        return response()->json([
            'message'=> 'da them',
            'data'=>$khoa
        ],201);
        }catch (ValidationException $e) {
            return response()->json([
                'message' => 'Lỗi',
                'errors' => $e->errors()
            ], 422);
        }
    }
    public function show($id)
    {
        return Faculty::with('subjects')->findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $khoa = Faculty::findOrFail($id);

        try{
        $data = $request->validate([
            'makhoa' => 'sometimes|string|max:255|unique:faculties,makhoa,' .$id,
            'tenkhoa'=> 'sometimes|string|max:255'
        ],
        [
            'makhoa.required'=> 'makhoa khong duoc de trong',
            'makhoa.unique' => 'ma da ton tai',

            'tenkhoa.required'=> 'ten khong duoc de trong',
        ]);

        $khoa->update($data);

        return response()->json([
            'message'=> 'cap nhat thanh cong',
            'data'=>$khoa
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
        $faculty = Faculty::findOrFail($id);

        if ($faculty->subjects()->count() > 0) {
            return response()->json([
                'message' => 'Không thể xóa khoa vì còn môn học'
            ], 400);
        }

        $faculty->delete();

        return response()->json([
            'message' => 'Xóa thành công'
        ]);
    }
}