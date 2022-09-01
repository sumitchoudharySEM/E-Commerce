<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $result[ 'data' ] = Size::all();
        return view( 'Admin/size', $result );
    }

    public function manage_size() {
        $url = 'size/manage_size_process';
        $heading = 'manage size';
        $result = compact( 'heading', 'url' );
        return view( 'Admin/manage_size' )->with( $result );
    }

    public function manage_size_process( Request $request ) {
        // return $request->post( '' );
        $request->validate( [
            'size'=>'required|unique:sizes,size',
        ] );

        $model = new Size();
        $model->size = $request->post( 'size' );
        $model->status = 1;
        $model->save();

        $request->session()->flash( 'message', 'size Inserted Successfully' );
        return redirect( 'admin/size' );
    }

    public function delete( Request $request, $id ) {
        $model = Size::find( $id );
        $model->delete();
        $request->session()->flash( 'message', 'size deleted Successfully' );
        return redirect( 'admin/size' );
    }

    public function edit( $id ) {
        $model = Size::find( $id );
        if ( !is_null( $model ) ) {
            $url = 'size/update'.'/'.$id;
            $heading = 'Edit size';
            $result = compact( 'model', 'heading', 'url' );
            return view( 'Admin/manage_size' )->with( $result );
        } else {
            return redirect( 'admin/size' );
        }
    }

    public function update( Request $request, $id ) {
        $model = Size::find( $id );
        $model->size = $request->post( 'size' );
        $model->save();
        $request->session()->flash( 'message', 'updated size successfully' );
        return redirect( 'admin/size' );
    }
    public function status(Request $request, $status,$id ) {
        $model =Size::find($id );
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','status updated successfully');
        return redirect('admin/size');
    }
}
