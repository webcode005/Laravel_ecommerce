<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            $result['category_id']=$arr['0']->category_id;
            $result['product_name']=$arr['0']->product_name;
            $result['product_slug']=$arr['0']->product_slug;
            $result['product_image']=$arr['0']->product_image;
            $result['brand']=$arr['0']->brand;
            $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['technical_specification']=$arr['0']->technical_specification;
            $result['uses']=$arr['0']->uses;
            $result['warranty']=$arr['0']->warranty;
            
            $result['id']=$arr['0']->id;

        } else {
            $result['category_id']='';
            $result['product_name']='';
            $result['product_slug']='';
            $result['product_image']='';
            $result['brand']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['uses']='';
            $result['warranty']='';
              $result['id']='';
        }

            $result['category']=DB::table('categories')->where(['status'=>1])->get();

       
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
        
        if ($request->hash_file('image') ) {

         $image=$request->file('image');
         $ext=$image->extension();

         $image_name=time().'.'.$ext;

         $image->storeAS('/public/media',$image_name);

         $model->product_image=$image_name;

        }

        $model->category_id=$request->post('category_id');
        $model->product_name = ucfirst($request->post('product_name'));
        // $model->product_image = ucfirst($request->post('product_image'));
        $model->product_slug = strtolower($request->post('product_slug'));

        $model->brand=$request->post('brand');
        $model->model=$request->post('model');
        $model->desc=$request->post('desc');
        $model->short_desc=$request->post('short_desc');
        $model->keywords=$request->post('keywords');
        $model->technical_specification=$request->post('technical_specification');
        $model->uses=$request->post('uses');
        $model->warranty=$request->post('warranty');     

        $model->status='0';

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
