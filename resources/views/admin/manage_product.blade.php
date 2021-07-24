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
                                        <form enctype="multipart/form-data" action="{{route('product.manage_product_process')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="product_name" class="control-label mb-1"> Name</label>
                                                <input id="product_name" value="{{$product_name}}" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('product_name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                           
                                            <div class="form-group">
                                                <label for="product_slug" class="control-label mb-1"> Slug</label>
                                                <input id="product_slug" value="{{$product_slug}}" name="product_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('product_slug')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="category_id" class="control-label mb-1"> Category</label>
                                                <select id="category_id" value="{{$category_id}}" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                               
                                                <option value="">Choose Category</option>
                                                @foreach($category as $list)

                                                @if($category_id==$list->id)
                                                    <option value="{{$list->id}}" selected>

                                                @else
                                                <option value="{{$list->id}}">
                                                @endif    
                                                {{$list->category_name}}</option>

                                               

                                                @endforeach
                                               
                                                    </select>
                                               
                                                @error('category_id')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="product_brand" class="control-label mb-1"> Brand</label>
                                                <input id="product_brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('brand')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="model" class="control-label mb-1"> Model</label>
                                                <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('model')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="desc" class="control-label mb-1"> Description</label>
                                                <input id="desc" value="{{$desc}}" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('desc')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="short_desc" class="control-label mb-1"> Short Description</label>
                                                <input id="short_desc" value="{{$short_desc}}" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('short_desc')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="keywords" class="control-label mb-1"> Keywords</label>
                                                <input id="keywords" value="{{$keywords}}" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('keywords')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="technical_specification" class="control-label mb-1"> Technical Specification</label>
                                                <input id="technical_specification" value="{{$technical_specification}}" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('technical_specification')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="uses" class="control-label mb-1"> Uses</label>
                                                <input id="uses" value="{{$uses}}" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('uses')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="warranty" class="control-label mb-1"> Warranty</label>
                                                <input id="warranty" value="{{$warranty}}" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('warranty')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="product_image" class="control-label mb-1"> Image</label>
                                                <input id="product_image" value="{{$product_image}}" name="product_image" type="file" class="form-control1" aria-required="true" aria-invalid="false" required>
                                                @error('product_image')
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