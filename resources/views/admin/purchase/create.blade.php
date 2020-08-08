@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @include('layouts.partial.flush')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Add New Supplair</h4>

      </div>
      <div class="card-body">
        <!-- Material form contact -->

                <!-- Form -->
                <form action="{{ route('purchase.store') }}" method="POST" class="text-center" style="color: #757575;">
@csrf
                    <!-- Name -->
                    <div class="md-form mt-3">
                        <input type="date" name="date" id="datepicker" class="form-control">
                        <label for="materialContactFormName">Purchase Date</label>
                    </div>

                    <!-- PUrchse No -->
                    <div class="md-form">
                        <input type="number" name="purchase_no" class="form-control">
                        <label for="materialContactFormEmail">Purchase No</label>
                    </div>
                    <!-- E-mail -->
                    <div class="md-form">
                        <select name="supplier" class="form-control" id="">
                            <option value="">Select Supplier Name</option>
                            @foreach($suppliers as $key => $supplier)
                            <option value="{{ $supplier->id}}">{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                        <label for="materialContactFormName">Suplier Name</label>
                    </div>
                    <div class="md-form">
                        <select name="product" class="form-control" id="">
                            <option value="">Select Product Name</option>
                            @foreach($products as $key => $product)
                            <option value="{{ $product->id}}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <label for="materialContactFormName">Product Name</label>
                    </div>
                    <div class="md-form">
                        <textarea name="discription" class="form-control" id="" cols="30" rows="10"></textarea>
                        <label for="materialContactFormEmail">Purchase Description Optional</label>
                    </div>
                    <!-- PUrchse No -->
                    <div class="md-form">
                        <input type="number" name="buying_quantity" id="buying_quantity" class="input form-control">
                        <label for="materialContactFormEmail">Purchase Quantity</label>
                    </div>
                    <div class="md-form">
                        <input type="number" name="unit_price" id="unit_price" class="input form-control">
                        <label for="materialContactFormEmail">Unit Price</label>
                    </div>
                    <div class="md-form">
                        <input type="number" name="buying_price" id="buying_price"  class="form-control">
                        <label for="materialContactFormEmail">Total Price</label>
                    </div>
                    <!-- Send button -->
                    <input type="submit" class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect"  value="Add New Purchase Product">

                </form>
                <!-- Form -->


    </div>
  </div>

@endsection

