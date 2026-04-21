<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        Product::created($request->all());
    }

    public function show($id)
    {
        return Product::find0rFail($id);
    }

    public function update(Request $request, $id)
    {
        $student = Product::findOrFail($id);
        $student->update($request->all());
        return $student;
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

}
