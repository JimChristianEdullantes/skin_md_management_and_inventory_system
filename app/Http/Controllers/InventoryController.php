<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('inventory.showInventory', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required:max: 50',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'critical_quantity' => 'required|numeric',
        ]);

        $newProduct = new Product();
        $newProduct->product_name = $request->name;
        $newProduct->product_description = $request->description;
        $newProduct->product_price = $request->price;
        $newProduct->product_quantity = $request->quantity;
        $newProduct->product_critical_quantity = $request->critical_quantity;
        $newProduct->save();

        return redirect('inventory')->with('productAdded', 'Product has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('inventory.editProduct', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required:max: 50',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'critical_quantity' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->product_name = $request->name;
        $product->product_description = $request->description;
        $product->product_price = $request->price;
        $product->product_quantity = $request->quantity;
        $product->product_critical_quantity = $request->critical_quantity;
        $product->save();

        return redirect('inventory')->with('productUpdated', 'Product has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('inventory')->with('productDeleted', 'Product has been deleted successfully');
    }
}
