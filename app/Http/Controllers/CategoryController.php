<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $result[ 'data' ] = Category::all();
        return view( 'Admin/category', $result );
    }

    public function manage_category() {
        $url= 'category/manage_category_process';
        $heading = 'manage category';
        $result = compact( 'heading','url' );
        return view( 'Admin/manage_category' )->with( $result );
    }

    public function manage_category_process( Request $request ) {
        // return $request->post( '' );
        $request->validate( [
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug',
        ] );

        $model = new Category();
        $model->category_name = $request->post( 'category_name' );
        $model->category_slug = $request->post( 'category_slug' );
        $model->status = 1;
        $model->save();

        $request->session()->flash( 'message', 'category Inserted Successfully' );
        return redirect( 'admin/category' );
    }

    public function delete( Request $request, $id ) {
        $model = Category::find( $id );
        $model->delete();
        $request->session()->flash( 'message', 'category deleted Successfully' );
        return redirect( 'admin/category' );
    }

    public function edit( $id ) {
        $model = Category::find( $id );
        if ( !is_null($model)) {
            $url= 'category/update'.'/'.$id;
            $heading = 'Edit category';
            $result = compact( 'model', 'heading','url' );
            return view( 'Admin/manage_category' )->with( $result );
        }
        else{
         return redirect('admin/category');
        }
    }
    public function update( Request $request, $id ) {
        $model =Category::find($id );
        $model->category_name= $request->post('category_name');
        $model->category_slug= $request->post('category_slug');
        $model->save();
        $request->session()->flash('message','updated category successfully');
        return redirect('admin/category');
    }
    public function status(Request $request, $status,$id ) {
        $model =Category::find($id );
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','status updated successfully');
        return redirect('admin/category');
    }

}
