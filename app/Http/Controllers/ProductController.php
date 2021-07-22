<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $result['data']=Product::all();
        return view('admin/product',$result);
    }

    public function manage_product(Request $request, $id='')
    {
        if ($id > 0 ) {
            
            $arr=Product::where(['id'=>$id])->get();
            $result['product_name']=$arr['0']->product_name;
            $result['product_slug']=$arr['0']->product_slug;
            $result['product_image']=$arr['0']->product_image;
            
            $result['id']=$arr['0']->id;

        } else {
            $result['product_name']='';
             $result['product_slug']='';
              $result['product_image']='';
              $result['id']='';
        }

       
        return view('admin/manage_product',$result);
    }

    
    public function manage_product_process(Request $request)
    {
        
        $request->validate([
            'product_name'=>'required',
            'product_image'=>'required',
            'product_slug'=>'required|unique:products,product_slug,'.$request->post('id'), 
        ]);        

        if ($request->post('id') > 0) {
           
            $model=Product::find($request->post('id'));

           $msg="Product Updated";

        } else {
            $model=new Product();
            $msg="Product Added";
        }
    
        $model->product_name = ucfirst($request->post('product_name'));
        $model->product_image = ucfirst($request->post('product_image'));
        $model->product_slug = strtolower($request->post('product_slug'));

        $model->save();

        $request->session()->flash('message',$msg);

        return redirect('admin/product');         
    
    }
    public function status(Request $request,$status,$id)
    {
        $model=Product::find($id);
        $model->status=$status;
        $model->save();

        $request->session()->flash('message','Product Status Updated Successfully');

        return redirect('admin/product');

    }

    
    public function delete(Request $request,$id)
    {
        $model=Product::find($id);
        $model=delete();

        $request->session()->flash('message','Product Deleted Successfully');

        return redirect('admin/product');

    }
   
}
