<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplairs = Supplier::all();
        return view('admin.supplair.manage', compact('supplairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplair.create');
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
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $supplair = new Supplier();
        $supplair->supplier_name = $request->name;
        $supplair->mobile_no = $request->mobile;
        $supplair->email = $request->email;
        $supplair->address = $request->address;
        $supplair->save();

        return redirect()->route('supplair.index')->with('success', 'New Supplair Added Successfully');

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
        $supplair = Supplier::find($id);
        return view('admin.supplair.edit', compact('supplair'));
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
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $supplair = Supplier::find($id);
        $supplair->supplier_name = $request->name;
        $supplair->mobile_no = $request->mobile;
        $supplair->email = $request->email;
        $supplair->address = $request->address;
        $supplair->save();

        return redirect()->route('supplair.index')->with('success', 'Supplair Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplair = Supplier::find($id);
        $supplair->delete();
        return redirect()->route('supplair.index')->with('success', 'Supplair Deleted Successfully');
    }
}
