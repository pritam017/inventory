@extends('layouts.app')

@section('content')

<div class="col-md-12">
    @include('layouts.partial.flush')
    <a href="{{ route('product.create') }}" class="btn btn-info pull-right">Add New Product</a>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage All Product</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead bg-primary">
                  <tr style="color: white;">
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplair Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product SKU</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                    @if(count($products) > 0)
                    @foreach ($products as $key=>$product)

                  <tr>
                    <th scope="row">{{ $key+=1 }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->supplier->supplier_name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <img src="{{ asset('images/product/'. $product->image) }}" width="50" alt="">
                    </td>
                    <td>{{ $product->product_sku }}</td>
                    <td>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $product->id }}">
                        <i class="fa fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">R You Sure You Want To Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                                        </td>
                                    </tr>

                  @endforeach
                  @else
                  <h4>NO PRODUCT ADDED</h4>
                             @endif
                </tbody>


              </table>
        </div>
      </div>
    </div>
  </div>

@endsection
