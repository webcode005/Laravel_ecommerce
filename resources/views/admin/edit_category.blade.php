@extends('admin.layout')

@section('container')

<div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {{session('message')}}
                                <div class="card">
                                    <div class="card-header"><a href="../" class="btn btn-warning"> << Back</a></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Category</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('category.insert')}}" method="post">
                                          @csrf
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="category" type="text" class="form-control" required >
                                                @error('category')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Category Slug</label>
                                                <input id="cc-name" name="category_slug" type="text" class="form-control cc-name valid"  required>
                                                <span class="field-validation-error" data-valmsg-for="cc-name" data-valmsg-replace="true">
                                                @error('category_slug'){{$message}}
                                                @enderror
                                                </span>
                                            
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                       
                        </div>


@endsection