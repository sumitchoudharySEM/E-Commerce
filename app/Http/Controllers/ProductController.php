<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $result[ 'data' ] = Product::all();
        return view( 'Admin/product', $result );
    }

    public function manage_product() {
        $url= 'product/manage_product_process';
        $heading = 'manage product';
        $category = DB::table('categories')->where(['status'=>1])->get();
        $size = DB::table('sizes')->where(['status'=>1])->get();
        $color = DB::table('colors')->where(['status'=>1])->get();
        $result = compact( 'heading','url','category','size','color' );
        return view( 'Admin/manage_product' )->with( $result );
        
        // echo '<pre>';
        // print_r($arr['category']);
        // die;
    }

    public function manage_product_process( Request $request ) {
        // return $request->post( '' );
        $request->validate( [
            'name'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'slug'=>'required|unique:products,slug',
        ] );

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            
        }

        $model = new Product();
        $model->name = $request->post( 'name' );
        $model->image=$image_name;
        // $model->image = $request->post( 'image' );
        $model->slug = $request->post( 'slug' );
        $model->category_id = $request->post( 'category_id' );
        $model->brand = $request->post( 'brand' );
        $model->model = $request->post( 'model' );
        $model->desc = $request->post( 'desc' );
        $model->short_desc = $request->post( 'short_desc' );
        $model->keywords = $request->post( 'keywords' );
        $model->technical_specification = $request->post( 'technical_specification' );
        $model->uses = $request->post( 'uses' );
        $model->warranty = $request->post( 'warranty' );
        $model->status = 1;
        $model->save();

        $request->session()->flash( 'message', 'product Inserted Successfully' );
        return redirect( 'admin/product' );
    }

    public function delete( Request $request, $id ) {
        $model = Product::find( $id );
        $model->delete();
        $request->session()->flash( 'message', 'product deleted Successfully' );
        return redirect( 'admin/product' );
    }

    public function edit( $id ) {
        $model = Product::find( $id );
        if ( !is_null($model)) {
            $url= 'product/update'.'/'.$id;
            $heading = 'Edit product';
            $category = DB::table('categories')->where(['status'=>1])->get();
            $size = DB::table('sizes')->where(['status'=>1])->get();
            $color = DB::table('colors')->where(['status'=>1])->get();
            $result = compact( 'model', 'heading','url','category','size','color');
            return view( 'Admin/manage_product' )->with( $result );
        }
        else{
         return redirect('admin/product');
        }
    }
    public function update( Request $request, $id ) {
        $model =Product::find($id );
        $model->name = $request->post( 'name' );
        //$model->image = $request->post( 'image' );
        $model->slug = $request->post( 'slug' );
        $model->category_id = $request->post( 'category_id' );
        $model->brand = $request->post( 'brand' );
        $model->model = $request->post( 'model' );
        $model->desc = $request->post( 'desc' );
        $model->short_desc = $request->post( 'short_desc' );
        $model->keywords = $request->post( 'keywords' );
        $model->technical_specification = $request->post( 'technical_specification' );
        $model->uses = $request->post( 'uses' );
        $model->warranty = $request->post( 'warranty' );
        $model->save();
        $request->session()->flash('message','updated product successfully');
        return redirect('admin/product');
    }
    public function status(Request $request, $status,$id ) {
        $model =Product::find($id );
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','status updated successfully');
        return redirect('admin/product');
    }
}
