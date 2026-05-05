<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    //
    public function index(){
        return Classroom::all();
    }

    public function store(Request $request){
        $data = $request->validate([
            'tenlop'=> 'required|string|max:255',
            'hocky'=> 'required|string|max:255',
            'nam'=> 'required|integer',
            'siso_max'=> 'required|integer',
            'subject_id' => 'required|exists:subjects,id'
        ]);
        $classroom = Classroom::create($data);
        return response()->json([
            'message'=> 'da them',
            'data'=>$classroom
        ],201);
    }

    public function show($id)
    {
        return Classroom::with('subject')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $lophoc = Classroom::findOrFail($id);

        $data = $request->validate([
            'tenlop'=> 'sometimes|string|max:255',
            'hocky'=> 'sometimes|string|max:255',
            'nam'=> 'sometimes|integer',
            'siso_max'=> 'sometimes|integer',
            'subject_id' => 'sometimes|exists:subjects,id'
        ]);

        $lophoc->update($data);

        return response()->json([
            'message'=> 'cap nhat thanh cong',
            'data'=>$lophoc
        ]);
    }

    public function destroy($id)
    {
        Classroom::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'da xoa'
        ]);
    }
}
