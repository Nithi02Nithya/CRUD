@extends('layouts.app')
@section('content')
@include('products.layouts')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Product List</div>
            <div class="card-body">
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>                                              
                        <th width=50px>S.No</th>
                        <th width=50px>Name</th>
                        <th width=50px>Quality</th>
                        <th width=50px>Description</th>
                        <th width=100px>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quality }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  <div class="float-end">
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
                  {{ $products->links() }}


            </div>
        </div>
    </div>    
</div>
<style>
body {
        background-color:pink;
        }
</style>
@endsection