@extends('admin/layout')
@section('page_title','Manage product')
@section('container')
    <h1 class="mb10">Manage Product</h1>
    <a href="{{url('admin/product')}}">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('product.manage_product_process')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="product_name" class="control-label mb-1">product Name</label>
                                                <input id="product_name" value="{{$product_name}}" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('product_name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="product_image" class="control-label mb-1">product Image</label>
                                                <input id="product_image" value="{{$product_image}}" name="product_image" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('product_image')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}        
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="product_slug" class="control-label mb-1">product Slug</label>
                                                <input id="product_slug" value="{{$product_slug}}" name="product_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('product_slug')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                            <input type="hidden" name="id" value="{{$id}}"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                           
                            
                            
                            
                            
                        </div>
                        
        </div>
    </div>
                        
@endsection