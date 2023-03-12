@extends('layouts.admin')

@section('title')
    Edit Product
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h3>Product {{ $product->name }} </h3>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('product.update', $product->id )}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group error">
                                            <label for="inputName">Product</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group error">
                                            <label for="inputName">Name Product</label>
                                            <input type="text" value="{{ $product->name_product }}" class="form-control" id="nameProduct" name="name_product">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group error">
                                            <label for="inputName">Description</label>
                                            <textarea class="form-control" id="Description" name="description">
                                                {{ $product->description}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn-save">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection