<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    //
    public function index()
    {
        return Subject::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mamon'=> 'required|string|max:50|unique:subjects',
            'tenmon'=> 'required|string|max:255',
            'sotinchi'=> 'required|integer|min:1|max:10'
        ]);

        $monhoc = Subject::create($data);
        return response()->json([
            'message'=> 'da them thanh cong',
            'data' => $monhoc
        ],201);
    }
    
    public function show($id)
    {
        return Subject::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $monhoc = Subject::findOrFail($id);
        $data = $request->validate([
            'mamon' => 'sometimes|string|max:50|unique:subjects, mamon'. $id,
            'tenmon'=> 'sometimes|string|max:255',
            'sotinchi' => 'sometimes|integer|min:1|max:10'
        ]);
        $monhoc->update($data);
        return response()->json([
            'message' => 'cap nhat thanh cong',
            'data' => $monhoc
        ]);
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();
        return response()->json([
            'message'=> 'da xoa thanh cong'
        ]);
    }
}
