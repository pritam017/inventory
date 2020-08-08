@extends('layouts.app')

@section('content')

<div class="col-md-12">
    @include('layouts.partial.flush')
    <a href="{{ route('supplair.create') }}" class="btn btn-info pull-right">Add New Supplair</a>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage All Supplair</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead bg-primary">
                  <tr style="color: white;">
                    <th scope="col">#</th>
                    <th scope="col">Supplair Name</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($supplairs as $key=>$supplair)

                  <tr>
                    <th scope="row">{{ $key+=1 }}</th>
                    <td>{{ $supplair->supplier_name }}</td>
                    <td>{{ $supplair->mobile_no }}</td>
                    <td>{{ $supplair->email }}</td>
                    <td>{{ $supplair->address }}</td>
                    <td>
<a href="{{ route('supplair.edit', $supplair->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $supplair->id }}">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $supplair->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{ route('supplair.destroy',$supplair->id) }}" method="POST">
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

              </table>
        </div>
      </div>
    </div>
  </div>
@endsection
