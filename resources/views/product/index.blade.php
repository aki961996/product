@extends('layouts.app')
@section('content')
@section('title', 'List Products')


<!-- Delete Confirmation Modal -->
@include('modal.deleteModel')
<!-- Delete Confirmation Modal -->

<div class="content-wrapper">
    <div class="row mx-0">
        <div class="col-12 card card-primary">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Products</h1>
                <a class="btn btn-primary" href="{{route('products.create')}}">Add Product</a>
            </div>
        </div>
    </div>

    {{-- search --}}
    <div class="card">

        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" value="{{Request::get('product_name')}}"
                            class="form-control" id="" placeholder="Enter product name">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="">Product price</label>
                        <input type="text" name="price" value="{{Request::get('price')}}" class="form-control" id=""
                            placeholder="Enter product price">
                    </div>

                    <div class="form-group col-sm-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                        <a href="{{route('products.index')}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                    </div>
                </div>

            </div>
        </form>
    </div>
    {{-- searh --}}
    {{-- msg --}}
    @include('message')
    {{-- msg --}}


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h5>Products List (Total : {{$product->total()}})</h5>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        @if ($product->isEmpty())
                                        <div class="alert alert-warning text-center">
                                            No products available.
                                        </div>
                                        @else
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product as $products)
                                                <tr>
                                                    <td>{{ $product->firstItem() + $loop->index }}</td>
                                                    <td>{{ $products->product_name }}</td>
                                                    <td>{{ $products->description }}</td>
                                                    <td>${{ $products->price }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a class="btn btn-primary mr-2"
                                                                href="{{ route('products.edit', encrypt($products->id)) }}">Edit</a>

                                                            <button class="btn btn-danger"
                                                                onclick="confirmDelete('{{ encrypt($products->id) }}')">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- Pagination Links -->
                                        <div style="padding: 10px; float:right;">
                                            {!!
                                            $product->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
                                            !!}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function confirmDelete(productId) {
        var url = "{{ route('products.destroy', ':id') }}";
        url = url.replace(':id', productId);
        $('#deleteForm').attr('action', url);
        $('#deleteModal').modal('show');
    }
</script>
@endsection