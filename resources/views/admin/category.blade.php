@extends('admin.layout')

@section('container')

<div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Category Table</h3>
                                <div class="table-data__tool">
                                   
                                    <div class="table-data__tool-left">
                                        <a href="{{url('admin/category/manage_category')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add Category</a>
                                        
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
                                                <th>Category Name</th>
                                                <th>Category Slug</th>                                                
                                                <th>date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $list)
                                            <tr class="tr-shadow">

                                                <td>{{$list->id}}</td>    

                                                <td>{{$list->category_name}}</td>
                                                <td>
                                                    <span class="block-email">{{$list->category_slug}}</span>
                                                </td>
                                               
                                                <td>{{$list->created_at}}</td>
                                                <!-- <td>
                                                    <span class="status--process">Processed</span>
                                                </td> -->
                                                <td>
                                                    <div class="table-data-feature">
                                                     
                                                        <a href="{{url('category/manage_category/')}}/{{$list->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="{{url('admin/category/delete/')}}/{{$list->id}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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