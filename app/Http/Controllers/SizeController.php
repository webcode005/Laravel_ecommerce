<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    
    public function index()
    {
        $result['data']=Size::all();
        return view('admin/size',$result);
    }

   
    public function manage_size(Request $request , $id='')
    {
        if ($id > 0 ) {
           $arr=Size::where(['id'=>$id])->get();

            $result['size']=$arr['0']->size;

            $result['id']=$arr['0']->id;

        } else {
            $result['size']='';
            $result['status']='1';
            $result['id']='0';
        }
       
        return view('admin/manage_size',$result);

    }

    
    public function manage_size_process(Request $request)
    {
        if($request->post('id')>0){
            $model=Size::find($request->post('id'));
            $msg="Size updated";
        }else{
            $model=new Size();
            $msg="Size inserted";
        }


        $model->size = ucfirst($request->post('size'));
        $model->status = '0';

        $model->save();

        $request->session()->flash('message',$msg);

        return redirect('admin/size');
    }

    
    public function status (Request $request,$status,$id)
    {
        
        $model=Size::find($id);
        $model->status=$status;
        $model->save();

        $request->session()->flash('message','Size Status Updated Successfully');

      return redirect('admin/size');
    }

    
    public function delete(Request $request,$id)
    {
        $model=Size::find($id);
        $model->delete();

        $request->session()->flash('message','Size Deleted Successfully');

        return redirect('admin/size');
    }

}
