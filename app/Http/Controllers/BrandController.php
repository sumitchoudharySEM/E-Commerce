<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $result[ 'data' ] = Brand::all();
        return view( 'Admin/brand', $result );
    }

    public function manage_brand() {
        $url = 'brand/manage_brand_process';
        $heading = 'manage brand';
        $result = compact( 'heading', 'url' );
        return view( 'Admin/manage_brand' )->with( $result );
    }

    public function manage_brand_process( Request $request ) {
        // echo '<pre>';
        // print_r( $request->post() );
        // die();
        
        $request->validate( [
            'name'=>'required|unique:brands,name',
            'image' =>'required|mimes:,jpeg',
        ] );
        
        $model = new Brand();
        // $model->image = $request->post( 'image' );
        if ( $request->hasfile( 'image' ) ) {
            $image = $request->file( 'image' );
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs( '/public/media', $image_name );
            $model->image = $image_name;
            // echo "$image_name" + "my name is antheny";
        }
        $model->name = $request->post( 'name' );
        $model->status = 1;
        $model->save();

        $request->session()->flash( 'message', 'brand Inserted Successfully' );
        return redirect( 'admin/brand' );
    }

    public function delete( Request $request, $id ) {
        $model = Brand::find( $id );
        $model->delete();
        $request->session()->flash( 'message', 'brand deleted Successfully' );
        return redirect( 'admin/brand' );
    }

    public function edit( $id ) {
        $model = Brand::find( $id );
        if ( !is_null( $model ) ) {
            $url = 'brand/update'.'/'.$id;
            $heading = 'Edit brand';
            $result = compact( 'model', 'heading', 'url' );
            return view( 'Admin/manage_brand' )->with( $result );
        } else {
            return redirect( 'admin/brand' );
        }
    }

    public function update( Request $request, $id ) {
        $model = Brand::find( $id );
        if ( $request->hasfile( 'image' ) ) {
            $image = $request->file( 'image' );
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs( '/public/media', $image_name );
            $model->image = $image_name;
        }else{
            $model->image = $model->image;
        }
        $model->name = $request->post( 'name' );
        $model->save();
        $request->session()->flash( 'message', 'updated brand successfully' );
        return redirect( 'admin/brand' );
    }
    public function status(Request $request, $status,$id ) {
        $model =Brand::find($id );
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','status updated successfully');
        return redirect('admin/brand');
    }
}
