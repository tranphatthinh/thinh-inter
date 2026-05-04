<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Dotenv\Store\File\Reader;

class DepartmentController extends Controller
{
    //
    public function index()
    {
        return Department::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'makhoa'=> 'required|string|max:255|unique:departments',
            'tenkhoa'=> 'required|string|max:255'
        ]);
        $khoa = Department::create($data);
        return response()->json([
            'message'=> 'da them',
            'data'=>$khoa
        ],201);
    }
    public function show($id)
    {
        return Department::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $khoa = Department::findOrFail($id);

        $data = $request->validate([
            'makhoa' => 'sometimes|string|max:255|unique:departments,makhoa,' .$id,
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
        Department::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'da xoa'
        ]);
    }
}