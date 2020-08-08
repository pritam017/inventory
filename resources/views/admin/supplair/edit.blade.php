@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @include('layouts.partial.flush')
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Update Supplair</h4>

      </div>
      <div class="card-body">
        <!-- Material form contact -->

                <!-- Form -->
                <form action="{{ route('supplair.update',$supplair->id) }}" method="POST" class="text-center" style="color: #757575;">
                    @csrf
                    @method('put')
                    <!-- Name -->
                    <div class="md-form mt-3">
                        <input type="text" name="name" value="{{ $supplair->supplier_name }}" class="form-control">
                        <label for="materialContactFormName">Supplair Name</label>
                    </div>

                    <!-- Mobile No -->
                    <div class="md-form">
                        <input type="number" value="{{ $supplair->mobile_no }}" name="mobile" class="form-control">
                        <label for="materialContactFormEmail">Phone No</label>
                    </div>
                    <!-- E-mail -->
                    <div class="md-form">
                        <input type="email" value="{{ $supplair->email }}" name="email" class="form-control">
                        <label for="materialContactFormEmail">E-mail</label>
                    </div>
                    <div class="md-form">
                        <input type="text" value="{{ $supplair->address }}" name="address" class="form-control">
                        <label for="materialContactFormEmail">Address</label>
                    </div>
                    <!-- Send button -->
                    <input type="submit" class="btn btn-outline-primary btn-rounded btn-block z-depth-0 my-4 waves-effect"  value="Update Supplair">

                </form>
                <!-- Form -->


    </div>
  </div>
@endsection
