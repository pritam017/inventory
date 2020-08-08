<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\User;
use Image;
use File;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        $supplier = Supplier::all();
        if($supplier->count() == 0){
            return redirect()->route('supplair.index')->with('warning', 'First Add A Supplier The Product');
        }
            return view('admin.product.manage', compact('products'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();

        return view('admin.product.create',compact('suppliers'));
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
            'name' => 'required',
            'supplier' => 'required',
            'quantity' => 'required',
            'sku' => 'required',
            'image' => 'required',
        ]);
        $product = new Product();

        $product->name = $request->name;
        $product->supplier_id = $request->supplier;
        $product->quantity = $request->quantity;
        $product->product_sku = $request->sku;


        if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/product/' . $img);
            Image::make($image)->save($location);
            $product->image = $img;
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'New Product Added Successfully');
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
        $suppliers = Supplier::all();
       return view('admin.product.edit', compact('product','suppliers'));
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
            'name' => 'required',
            'supplier' => 'required',
            'quantity' => 'required',
            'sku' => 'required',

        ]);
        $product = Product::find($id);

        $product->name = $request->name;
        $product->supplier_id = $request->supplier;
        $product->quantity = $request->quantity;
        $product->product_sku = $request->sku;

        if ( $request->image )
        {
             // Delete Existing Image
             if ( File::exists('images/product/' . $product->image ) ){
                File::delete('images/product/' . $product->image);
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/product/' . $img);
            Image::make($image)->save($location);
            $product->image = $img;
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');

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

        if ( !is_null($product) ){
            // Delete Brand Image
            if ( File::exists('images/product/' . $product->image ) ){
                        File::delete('images/product/' . $product->image);
            }
            $product->delete();
        }
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }

}
