<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $result[ 'data' ] = Color::all();
        return view( 'Admin/color', $result );
    }

    public function manage_color() {
        $url = 'color/manage_color_process';
        $heading = 'manage color';
        $result = compact( 'heading', 'url' );
        return view( 'Admin/manage_color' )->with( $result );
    }

    public function manage_color_process( Request $request ) {
        // return $request->post( '' );
        $request->validate( [
            'color'=>'required|unique:colors,color',
        ] );

        $model = new Color();
        $model->color = $request->post( 'color' );
        $model->status = 1;
        $model->save();

        $request->session()->flash( 'message', 'color Inserted Successfully' );
        return redirect( 'admin/color' );
    }

    public function delete( Request $request, $id ) {
        $model = Color::find( $id );
        $model->delete();
        $request->session()->flash( 'message', 'color deleted Successfully' );
        return redirect( 'admin/color' );
    }

    public function edit( $id ) {
        $model = Color::find( $id );
        if ( !is_null( $model ) ) {
            $url = 'color/update'.'/'.$id;
            $heading = 'Edit color';
            $result = compact( 'model', 'heading', 'url' );
            return view( 'Admin/manage_color' )->with( $result );
        } else {
            return redirect( 'admin/color' );
        }
    }

    public function update( Request $request, $id ) {
        $model = Color::find( $id );
        $model->color = $request->post( 'color' );
        $model->save();
        $request->session()->flash( 'message', 'updated color successfully' );
        return redirect( 'admin/color' );
    }
    public function status(Request $request, $status,$id ) {
        $model =Color::find($id );
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','status updated successfully');
        return redirect('admin/color');
    }
}
