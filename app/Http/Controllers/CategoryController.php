<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
 
    public function index()
    {
        $result['data']=Category::all();
        return view('admin/category',$result);
    }

    // public function manage_category()
    // {
    //     return view('admin.add_category');
    // }

    public function manage_category(Requset $request, $id='')
    {
        if($id>0){
            $arr=Category::where(['id'=>$id])->get(); 

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['id']=0;
            
        }

        echo '<pre>';

        print_r($result);

        die();

        return view('admin/manage_category',$result);
        

        
        //return view('admin.add_category');
    }

    public function manage_category_process(Request $request)
    {
       
        $request->validate([
            'category'=>'required',
            'category_slug'=>'required|unique:categories',
        ]);

        if($request->post('id')>0){
            $model=Category::find($request->post('id'));
            $msg="Category updated";
        }else{
            $model=new Category();
            $msg="Category inserted";
        }


        $model->category_name = ucfirst($request->post('category'));
        $model->category_slug = strtolower($request->post('category_slug'));

        $model->save();

        $request->session()->flash('message','Category Created Successfully');

        return redirect('admin/category');

    }

    
    public function delete(Request $request,$id)
    {
        $model=Category::find($id);
        $model->delete();

        $request->session()->flash('message','Category Deleted Successfully');

        return redirect('admin/category');
    }
}
