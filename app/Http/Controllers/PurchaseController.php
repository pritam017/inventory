<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use App\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::latest()->get();
        $supplier = Supplier::all();
        $product = Product::all();
        if($supplier->count() == 0){
            return redirect()->route('supplair.index')->with('warning', 'First Add A Supplier Then go to Purchase');
        }elseif($product->count() == 0){
            return redirect()->route('product.index')->with('warning', 'First Add A Product Then go to Purchase');
        }
        return view('admin.purchase.manage', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('admin.purchase.create', compact('suppliers','products'));
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
            'date' => 'required',
            'purchase_no' => 'required',
            'supplier' => 'required',
            'product' => 'required',
            'discription' => 'required',
            'buying_quantity' => 'required',
            'unit_price' => 'required',
            'buying_price' => 'required',
        ]);
        $purchases = new Purchase();
        $purchases->supplier_id     = $request->supplier;
        $purchases->product_id      = $request->product;
        $purchases->date            = $request->date;
        $purchases->purchase_no     = $request->purchase_no;
        $purchases->discription     = $request->discription;
        $purchases->buying_qty      = $request->buying_quantity;
        $purchases->unit_price      = $request->unit_price;
        $purchases->buying_price    = $request->buying_price;
        $purchases->save();

        return redirect()->route('purchase.index')->with('success', 'New Purchase Added Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchases = Purchase::find($id);
        $purchases->delete();
        return redirect()->route('purchase.index')->with('success', 'Purchase Deleted Successfully');
    }
}
