<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    
    public function index()
    {
        $result['data']=Color::all();
        return view('admin.color',$result);
    }

    public function manage_color (Request $request, $id='')
    {

       if ($id > 0 ) {

           $arr=Color::where(['id'=>$id])->get();
           $result['color']=$arr['0']->color;
           $result['id']=$arr['0']->id;

       } else {
          $result['color']='';
           $result['id']='0';
       }

       return view('admin/manage_color',$result);
       
    }
 

    public function manage_color_process (Request $request)
    {
       
        $request->validate([
            'color'=>'required|unique:colors,color,'.$request->post('id'),   
        ]);


       if($request->post('id')>0){
            $model=Color::find($request->post('id'));
            $msg="Color updated";
        }else{
            $model=new Color();
            $msg="Color inserted";
        }

        $model->color = ucfirst($request->post('color'));
        $model->status = '0';

        $model->save();

        $request->session()->flash('message',$msg);

        return redirect('admin/color');
    }

    
    public function status(Request $request,$status,$id)
    {
        $model=Color::find($id);
        $model->status=$status;
        $model->save();

        $request->session()->flash('message','Color Status Updated Successfully');

        return redirect('admin/color');


    }

    
    public function delete(Request $request,$id)
    {
        $model=Color::find($id);
        $model->delete();

        $request->session()->flash('message','Color Deleted Successfully');

        return redirect('admin/color');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        //
    }
}
