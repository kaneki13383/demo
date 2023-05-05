<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $product = Product::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'discription' => $request->input('discription'),
            'img' => $request->input('img'),
        ]);

        return response()->json([
            'message' => 'Товар добавлен!',
            'data' => $product
        ]);
    }

    public function show()
    {
        return Product::all();
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();

        return response()->json([
            'message' => 'Товар удален!'
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'discription' => $request->input('discription'),
            'img' => $request->input('img'),
        ]);

        return response()->json([
            'message' => 'Товар изменен!'
        ]);
    }
}
