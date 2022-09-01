<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $result['data']=Category::all();
       return view('Admin/category' ,$result);
    }
    public function manage_category()
    {
       return view('Admin/manage_category');
    }
    public function manage_category_process(Request $request)
    {
      // return $request->post("");
        $request->validate([
         'category_name'=>'required',
         'category_slug'=>'required|unique:categories',
        ]);

        $model =new Category();
        $model->category_name =$request->post('category_name');
        $model->category_slug =$request->post('category_slug');
        $model->save();

        $request->session()->flash('message','category Inserted Successfully');
        return redirect('admin/category');
    }

    public function delete(Request $request,$id)
    {
      $model =Category::find($id);
      $model->delete();
      $request->session()->flash('message','category deleted Successfully');
      return redirect('admin/category');
    }

    
}
