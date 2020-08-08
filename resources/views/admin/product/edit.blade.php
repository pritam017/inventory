@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @include('layouts.partial.flush')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Update Product</h4>

      </div>
      <div class="card-body">
        <!-- Material form contact -->

                <!-- Form -->
                <form action="{{ route('product.update',$product->id) }}" method="POST" class="text-center" style="color: #757575;" enctype="multipart/form-data">
@csrf
@method('put')
                    <!-- Name -->
                    <div class="md-form mt-3">
                        <input type="text" value="{{ $product->name }}"name="name" class="form-control">
                        <label for="materialContactFormName">Product Name</label>
                    </div>

                    <!-- Mobile No -->
                    <div class="md-form">
                        <select name="supplier" class="form-control" id="">
                            <option value="">Select Supplier Name</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id}}"{{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                        <label for="materialContactFormName">Suplier Name</label>
                    </div>
                    <!-- E-mail -->
                    <div class="md-form">
                        <input type="number"  value="{{ $product->quantity }}"name="quantity" class="form-control">
                        <label for="materialContactFormEmail">Product Quantity</label>
                    </div>
                    <div class="md-form">
                        <input type="text" name="sku"value="{{ $product->product_sku }}" class="form-control">
                        <label for="materialContactFormEmail">Product SKU</label>
                    </div>
                    <div class="md-form">
                        <input type="file" name="image" class="form-control">
                        <label for="materialContactFormEmail">Product Image</label>
                        <img src="{{ asset('images/product/'. $product->image) }}" width="50" alt="">
                    </div>
                    <!-- Send button -->
                    <input type="submit" class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect"  value="Add New Product">

                </form>
                <!-- Form -->


    </div>
  </div>
@endsection
