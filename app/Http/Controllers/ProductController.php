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

            $result['productAttrArr']=DB::table('products_atrr')->where(['product_id'=>$id])->get();

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

            //Product ATTR


            $result['productAttrArr'][0]['id']='';
            $result['productAttrArr'][0]['prducts_id']='';
            $result['productAttrArr'][0]['sku']='';
            $result['productAttrArr'][0]['attr_image']='';
            $result['productAttrArr'][0]['mrp']='';
            $result['productAttrArr'][0]['price']='';
            $result['productAttrArr'][0]['qty']='';
            $result['productAttrArr'][0]['size_id']='';
            $result['productAttrArr'][0]['color_id']='';
            $result['productAttrArr'][0]['qty']='';

            //ENd Product ATTR
        }

            $result['category']=DB::table('categories')->where(['status'=>1])->get();

            $result['sizes']=DB::table('sizes')->where(['status'=>1])->get();

            $result['colors']=DB::table('colors')->where(['status'=>1])->get();

       
        return view('admin/manage_product',$result);
    }

    
    public function manage_product_process(Request $request)
    {

        // return $request->post();
        // die();

        if ($request->post('id') > 0) {
           
            $image_validation="mimes:jpeg,jpg,png";
        } else {
            $image_validation="required|mimes:jpeg,jpg,png";
        }
        
        $request->validate([
            'product_name'=>'required',
            'product_image'=>$image_validation,
            'product_slug'=>'required|unique:products,product_slug,'.$request->post('id'), 
        ]);    
        
        $paidArr= $request->post('paid');

        $skuArr= $request->post('sku');
        $mrpArr= $request->post('mrp');
        $priceArr= $request->post('price');
        $qtyArr= $request->post('qty');
        $size_idArr= $request->post('size_id');
        $color_idArr= $request->post('color_id');

        foreach ($skuArr as $key=>$val)
        {
                $check=DB::table('products_atrr')->
                where('sku','=',$skuArr[$key])->
                where('id','=',$paidArr[$key])->
                get();

                if(isset($check[0])){
                    $request->session()->flash('sku_error',$skuArr[$key].'SKU Already Used');
                    return redirect(request()->headers->get('referer'));
                }
        }


        if ($request->post('id') > 0) {
           
            $model=Product::find($request->post('id'));

           $msg="Product Updated";

        } else {
            $model=new Product();
            $msg="Product Added";
        }
        
        if ($request->hasfile('product_image') ) {

         $image=$request->file('product_image');
         $ext=$image->extension();

         $image_name=time().'.'.$ext;

         $image->storeAs('/public/media',$image_name);

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

         $pid=$model->id;

        // Start Product Attribute


            $paidArr= $request->post('paid');

            $skuArr= $request->post('sku');
            $mrpArr= $request->post('mrp');
            $priceArr= $request->post('price');
            $qtyArr= $request->post('qty');
            $size_idArr= $request->post('size_id');
            $color_idArr= $request->post('color_id');

            foreach ($skuArr as $key=>$val)
            {
                $productAttrArr['product_id']=$pid;;
                $productAttrArr['sku']=$skuArr[$key];
                $productAttrArr['attr_image']='test';
                $productAttrArr['mrp']=$mrpArr[$key];
                $productAttrArr['price']=$priceArr[$key];
                $productAttrArr['qty']=$qtyArr[$key];

                if ($size_idArr[$key]=='') {
                    $productAttrArr['size_id']=0;
                } else {
                    $productAttrArr['size_id']=$size_idArr[$key];
                }

                if ($color_idArr[$key]=='') {
                    $productAttrArr['color_id']=0;
                } else {
                    $productAttrArr['color_id']=$color_idArr[$key];
                }
                

                
                // $productAttrArr['color_id']=$color_idArr['key'];

                

                if($paidArr[$key]!='')
                {
                    DB::table('products_atrr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
                }
                else
                {
                    DB::table('products_atrr')->insert($productAttrArr);
                }


                
            }


         // End Product Attribute


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

    public function prodAttrdelete(Request $request,$paid,$pid)
    {
        DB::table('products_atrr')->where(['id' =>$paid])->delete();

        $request->session()->flash('message','ProductAttr Deleted Successfully');

        return redirect('admin/product/manage_product/'.$pid);

    }
   
}
