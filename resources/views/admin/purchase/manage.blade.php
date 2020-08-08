@extends('layouts.app')

@section('content')

<div class="col-md-12">
    @include('layouts.partial.flush')
    <a href="{{ route('purchase.create') }}" class="btn btn-info pull-right">Add New Purchase Product</a>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage All Purchase Item</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead bg-primary">
                  <tr style="color: white;">
                    <th scope="col">#</th>
                    <th scope="col">Supplair Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Purchase Quantity</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @if(count($purchases) > 0)
                <tbody>
                    @foreach ($purchases as $key=>$purchase)

                  <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $purchase->supplier->supplier_name }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ date('d-m-Y',strtotime($purchase->date)) }}</td>
                    <td>{{ $purchase->buying_qty }}</td>
                    <td>{{ $purchase->unit_price }}</td>
                    <td>{{ $purchase->buying_price }}</td>
                    <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $purchase->id }}">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $purchase->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{ route('purchase.destroy',$purchase->id) }}" method="POST">
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
                </tbody>
                @else
                <h4>No Purchase Found</h4>
                           @endif
              </table>
        </div>
      </div>
    </div>
  </div>
@endsection
