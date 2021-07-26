@extends('admin/layout')
@section('page_title','Manage product')
@section('container')
@if($id > 0)
{{$image_required=""}}
@else
{{$image_required="required"}}
@endif
<h1 class="mb10">Manage Product</h1>
<a href="{{url('admin/product')}}">
<button type="button" class="btn btn-success">
Back
</button>
</a>
<div class="row m-t-30">
   <div class="col-md-12">
   <form enctype="multipart/form-data" action="{{route('product.manage_product_process')}}" method="post">
                     @csrf

      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-body">
                  <form enctype="multipart/form-data" action="{{route('product.manage_product_process')}}" method="post">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="product_name" class="control-label mb-1"> Name</label>
                              <input id="product_name" value="{{$product_name}}" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                              @error('product_name')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="product_slug" class="control-label mb-1"> Slug</label>
                              <input id="product_slug" value="{{$product_slug}}" name="product_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('product_slug')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
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
                                    {{$list->category_name}}
                                 </option>
                                 @endforeach
                              </select>
                              @error('category_id')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="product_brand" class="control-label mb-1"> Brand</label>
                              <input id="product_brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('brand')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="model" class="control-label mb-1"> Model</label>
                              <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('model')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="desc" class="control-label mb-1"> Description</label>
                              <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$desc}}</textarea>
                              @error('desc')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="short_desc" class="control-label mb-1"> Short Description</label>
                              <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$short_desc}}</textarea>
                              @error('short_desc')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="keywords" class="control-label mb-1"> Keywords</label>
                              <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$keywords}}</textarea>
                              @error('keywords')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="technical_specification" class="control-label mb-1"> Technical Specification</label>
                              <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$technical_specification}}</textarea>
                              @error('technical_specification')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="uses" class="control-label mb-1"> Uses</label>
                              <input id="uses" value="{{$uses}}" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('uses')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="warranty" class="control-label mb-1"> Warranty</label>
                              <input id="warranty" value="{{$warranty}}" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('warranty')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="product_image" class="control-label mb-1"> Image</label>
                              <input id="product_image" value="{{$product_image}}" name="product_image" type="file" class="form-control1" aria-required="true" aria-invalid="false" {{$image_required}}>
                              @error('product_image')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}        
                              </div>
                              @enderror
                           </div>
                        </div>                     
                 
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-lg-12">
         <h2>Product Attr</h2>
         <div id="product_attr_box">
            <div class="card" id="product_attr_1">
               <div class="card-body">
               
                     <div class="row">                    
                      
                       
                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="sku" class="control-label mb-1"> SKU</label>
                              <input id="sku" value="" name="sku" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('sku')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="product_price" class="control-label mb-1"> Price</label>
                              <input id="product_price" value="" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('price')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="mrp" class="control-label mb-1"> MRP</label>
                              <input id="mrp" value="" name="mrp" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('mrp')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>

                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="size_id" class="control-label mb-1"> Size</label>
                              <select id="size_id" name="size_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                 <option value="">Choose </option>
                                 @foreach($sizes as $list)
                                                                 
                                 <option value="{{$list->id}}">
                                  
                                    {{$list->size}}
                                 </option>
                                 @endforeach
                              </select>
                              @error('size_id')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>

                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="color_id" class="control-label mb-1"> Color</label>
                              <select id="color_id" name="color_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                 <option value="">Choose </option>
                                 @foreach($colors as $list)
                                 
                                 <option value="{{$list->id}}">
                                
                                 
                                    {{$list->color}}
                                 </option>
                                 @endforeach
                              </select>
                              @error('color_id')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>

                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="product_qty" class="control-label mb-1"> QTY</label>
                              <input id="product_qty" value="" name="qty" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                              @error('qty')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}		
                              </div>
                              @enderror
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="attr_image" class="control-label mb-1"> Attr Image</label>
                              <input id="attr_image" name="attr_image" type="file" class="form-control1" aria-required="true" aria-invalid="false" {{$image_required}}>
                              @error('attr_image')
                              <div class="alert alert-danger" role="alert">
                                 {{$message}}        
                              </div>
                              @enderror
                           </div>
                        </div>

                        <div class="col-md-2">
                           <div class="form-group">
                              <label for="attr_image" class="control-label mb-1"> Attr Image</label>
                              
                            <button type="button" class="btn btn-success" onclick="add_more()" >Add +</button>

                           </div>

                        </div>

                        
                     </div>
                 
               </div>
            </div>
        </div>
            <div class="col-md-12 ">
                           <div>
                              <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                              Submit
                              </button>
                           </div>
                           <input type="hidden" name="id" value="{{$id}}"/>
                        </div>



         </div>
      </div>
</form>
   </div>
</div>


<script>
    var loop_count=1;
    function add_more()
    {
        loop_count++;

        var html=' <div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="row">';
                        
            html+='<div class="col-md-2"><div class="form-group"><label for="sku" class="control-label mb-1"> SKU</label><input id="sku" value="" name="sku" type="text" class="form-control" aria-required="true" aria-invalid="false" required>@error('sku')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
            html+='<div class="col-md-2"><div class="form-group"><label for="product_price" class="control-label mb-1"> Price</label><input id="product_price" value="" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" required>@error('price')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
            html+='<div class="col-md-2"><div class="form-group"><label for="mrp" class="control-label mb-1"> MRP</label><input id="mrp" value="" name="mrp" type="number" class="form-control" aria-required="true" aria-invalid="false" required>@error('mrp')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
            html+='<div class="col-md-2"><div class="form-group"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="size_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required><option value="">Choose </option>@foreach($sizes as $list)<option value="{{$list->id}}">{{$list->size}}</option>@endforeach</select>@error('size_id')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
            html+='<div class="col-md-2"><div class="form-group"><label for="color_id" class="control-label mb-1"> Color</label><select id="color_id" name="color_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required><option value="">Choose </option>@foreach($colors as $list)<option value="{{$list->id}}">{{$list->color}}</option>@endforeach</select>@error('color_id')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
            html+='<div class="col-md-2"><div class="form-group"><label for="product_qty" class="control-label mb-1"> QTY</label><input id="product_qty" value="" name="qty" type="number" class="form-control" aria-required="true" aria-invalid="false" required>@error('qty')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
            html+='<div class="col-md-3"><div class="form-group"><label for="attr_image" class="control-label mb-1"> Attr Image</label><input id="attr_image" name="attr_image" type="file" class="form-control1" aria-required="true" aria-invalid="false" {{$image_required}}>@error('attr_image')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
            html+='<div class="col-md-2"><div class="form-group"><label for="color_id" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger" onclick="remove_more('+loop_count+')">Remove -</button></div></div>';
                        
            html+='</div></div></div>';


        jQuery('#product_attr_box').append(html);

    }

    function remove_more(loop_count)
    {
        jQuery('#product_attr_'+loop_count).remove();
    }

</script>


@endsection