<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $img = $request->file('img');
        $img->move(public_path('images'), $img->getClientOriginalName());
        Product::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'discription' => $request->input('discription'),
            'discription2' => $request->input('discription2'),
            'img' => '/images/' . $img->getClientOriginalName(),
        ]);

        return back();
    }

    public function show()
    {
        return Product::all();
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();

        return back();
    }

    public function update(Request $request)
    {
        $img = $request->file('img');
        if ($img != null) {
            $img->move(public_path('images'), $img->getClientOriginalName());


            Product::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'discription' => $request->input('discription'),
                'discription2' => $request->input('discription2'),
                'img' => '/images/' . $img->getClientOriginalName(),
            ]);

            return redirect('/admin');
        } else {
            Product::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'discription' => $request->input('discription'),
                'discription2' => $request->input('discription2'),
            ]);

            return redirect('/admin');
        }
    }
}
