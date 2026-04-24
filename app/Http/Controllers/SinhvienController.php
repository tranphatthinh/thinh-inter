<?php

namespace App\Http\Controllers;

use App\Models\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SinhvienController extends Controller
{
    public function index()
    {
        //
        return Sinhvien::all();
    }

    public function store(Request $request)
    {
        try {
        $data = $request->validate([
            'masinhvien'=> 'required|string|max:50|unique:sinhviens',
            'tensinhvien'=> 'required|string|max:255',
            'email'=> 'required|email|max:50|unique:sinhviens'
        ],
        [
            'masinhvien.required'=> 'masv khong duoc de trong',
            'masinhvien.unique' => 'ma da ton tai',

            'tensinhvien.required'=> 'ten khong duoc de trong',
            
            'email.required'=> 'email khong duoc de trong',
            'email.email'=>'email khong dung dinh dang',
            'email.unique'=> 'email da ton tai'
        ]);

        $sinhvien = Sinhvien::create($data);
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
        return  Sinhvien::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $sinhvien = Sinhvien::findOrFail($id);
        
    try{
        $data = $request->validate([
            'masinhvien'=> 'sometimes|string|max:50|unique:sinhviens,masinhvien,'. $id,
            'tensinhvien'=>'sometimes|string|max:255',
            'email'=>'sometimes|email|max:50|unique:sinhviens,email,'. $id
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
        Sinhvien::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'xoa thanh cong'
        ]);
    }
}
