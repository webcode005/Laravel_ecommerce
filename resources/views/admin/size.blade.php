@extends('admin.layout')
@section('page_title','Size')
@section('size_select','active')
@section('container')

<div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Size Table</h3> 
                                <div class="table-data__tool">
                                   
                                    <div class="table-data__tool-left">
                                        <a href="{{url('admin/size/manage_size')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add Size</a>
                                        
                                    </div>
                                </div>
                               
                                        <div class="">
                                                {{session('message')}}
                                        </div>
                            
                                
                                <div class="table-responsive table-responsive-data3">
                                    <table class="table table-data3">
                                        <thead>
                                            <tr>  
                                                <th>#</th>
                                                <th>Size</th> 
                                                <th>Status</th>
                                                <th>date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr class="tr-shadow">

                                                <td>{{$list->id}}</td> 
                                                <td>
                                                    <span class="block-email">{{$list->size}}</span>
                                                </td>

                                                 <td>
                                                     @if($list->status==1)
                                                    <a href="{{url('admin/size/status/0')}}/{{$list->id}}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Deactive">Active</a>
                                                     @elseif($list->status==0)
                                                    <a href="{{url('admin/size/status/1')}}/{{$list->id}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Active">Deactive</a>
                                                    @endif
                                                </td>
                                               
                                                <td>{{$list->created_at}}</td>
                                                <!-- <td>
                                                    <span class="status--process">Processed</span>
                                                </td> -->
                                                <td>
                                                    <div class="table-data-feature">
                                                     

                                                        <a href="{{url('admin/size/manage_size/')}}/{{$list->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="{{url('admin/size/delete/')}}/{{$list->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                       
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>

                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                      


@endsection