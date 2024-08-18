<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validate;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('welcome', [
            'products' => \App\Models\Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . " ". $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        Product::create($input);
        return redirect()->route('welcome')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
        return view('show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
        return view('edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'detail' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('YmdHis'). " ". $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $product->update($input);
        return redirect()->route('welcome')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
        $product->delete();
        return redirect()->route('welcome')->with('success', 'Product created successfully.');
    }

    public function search(Request $request)
    {
        //
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', '%'. $search. '%')->paginate(5);
        return view('welcome', compact('products'));
    }
}
