<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;
use Dotenv\Store\File\Reader;

class KhoaController extends Controller
{
    //
    public function index()
    {
        return Khoa::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'makhoa'=> 'request|string|max:255|unique:khoas',
            'tenkhoa'=> 'request|string|max:255'
        ]);
        $khoa = Khoa::create($data);
        return response()->json([
            'message'=> 'da them',
            'data'=>$khoa
        ],201);
    }
    public function show($id)
    {
        return Khoa::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $khoa = Khoa::findOrFail($id);

        $data = $request->validate([
            'makhoa' => 'sometimes|string|max:255|unique:khoas,makhoa,' .$id,
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
        Khoa::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'da xoa'
        ]);
    }
}