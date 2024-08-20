@extends('layouts.app')
@section('content')
@section('title', 'Edit Products')

<div class="row mx-0">
    <div class="col-12 card card-primary">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Edit Products</h1>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>



<div class="col-md-6 offset-sm-3 mt-4">

    <div class="card card-primary">
        <form action="{{ route('products.update', $product) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="">Product Name</label>

                    <input type="text" class="form-control" name="product_name" id="product_name"
                        value="{{$product->product_name}}" placeholder="Enter product name">
                    <div style="color: red">{{$errors->first('product_name')}}</div>

                </div>
                <div class="form-group">
                    <label for="">Description</label>

                    <textarea name="description" class="form-control" placeholder="Enter description"
                        id="description">{{$product->description}}</textarea>
                    <div style="color: red">{{$errors->first('description')}}</div>

                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control"
                        value="{{$product->price}}" step="0.01">
                </div>
                <div style="color: red">{{$errors->first('price')}}</div>
            </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update Product</button>
    </div>
    </form>
</div>

@endsection