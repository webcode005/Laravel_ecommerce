@extends('admin/layout')
@section('page_title','Manage coupon')
@section('container')
    <h1 class="mb10">Manage coupon</h1>
    <a href="{{url('admin/coupon')}}">
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
                                        <form action="{{route('coupon.manage_coupon_process')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="coupon_title" class="control-label mb-1">Coupon title</label>
                                                <input id="coupon_title" value="{{$title}}" name="coupon_title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('coupon_title')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="coupon_code" class="control-label mb-1">Coupon code</label>
                                                <input id="coupon_code" value="{{$code}}" name="coupon_code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('coupon_code')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}		
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="coupon_value" class="control-label mb-1">Coupon value</label>
                                                <input id="coupon_value" value="{{$value}}" name="coupon_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('coupon_value')
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