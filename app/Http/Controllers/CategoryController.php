<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return Category::all();
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'request|string|max:255',
            'status' => 'boolean'
        ]);

        $category = Category::create($data);
        return response()->json([
            'message' => 'Đã tạo thành công',
            'data' => $category
        ], 201);
    }
    public function show($id)
    {
        return Category::findOrFail($id);

    }
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name'=>'sometimes|string|max:255',
            'status'=> 'boolean'
        ]);

        $category = Category::updated($data);
        return response()->json([
            'message' => 'Cập nhật thành công',
            'data' => $category
        ],201);
    }
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'xoa thanh cong'
        ]);
    }
}
    
