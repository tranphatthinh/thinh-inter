<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Dotenv\Store\File\Reader;

class FacultyController extends Controller
{
    //
    public function index()
    {
        return Faculty::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'makhoa'=> 'required|string|max:255|unique:faculties',
            'tenkhoa'=> 'required|string|max:255'
        ]);
        $khoa = Faculty::create($data);
        return response()->json([
            'message'=> 'da them',
            'data'=>$khoa
        ],201);
    }
    public function show($id)
    {
        return Faculty::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $khoa = Faculty::findOrFail($id);

        $data = $request->validate([
            'makhoa' => 'sometimes|string|max:255|unique:faculties,makhoa,' .$id,
            'tenkhoa'=> 'sometimes|string|max:255'
        ]);

        $khoa->update($data);

        return response()->json([
            'message'=> 'cap nhat thanh cong',
            'data'=>$khoa
        ]);
    }
    public function destroy($id)
    {
        Faculty::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'da xoa'
        ]);
    }
}