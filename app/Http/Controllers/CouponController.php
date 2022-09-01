<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $result[ 'data' ] = Coupon::all();
        return view( 'Admin/coupon', $result );
    }

    public function manage_coupon() {
        $url = 'coupon/manage_coupon_process';
        $heading = 'manage coupon';
        $result = compact( 'heading', 'url' );
        return view( 'Admin/manage_coupon' )->with( $result );
    }

    public function manage_coupon_process( Request $request ) {
        // return $request->post( '' );
        $request->validate( [
            'title'=>'required',
            'code'=>'required|unique:coupons,code',
            'value'=>'required',
        ] );

        $model = new Coupon();
        $model->title = $request->post( 'title' );
        $model->code = $request->post( 'code' );
        $model->value = $request->post( 'value' );
        $model->save();

        $request->session()->flash( 'message', 'coupon Inserted Successfully' );
        return redirect( 'admin/coupon' );
    }

    public function delete( Request $request, $id ) {
        $model = Coupon::find( $id );
        $model->delete();
        $request->session()->flash( 'message', 'coupon deleted Successfully' );
        return redirect( 'admin/coupon' );
    }

    public function edit( $id ) {
        $model = Coupon::find( $id );
        if ( !is_null( $model ) ) {
            $url = 'coupon/update'.'/'.$id;
            $heading = 'Edit Coupon';
            $result = compact( 'model', 'heading', 'url' );
            return view( 'Admin/manage_coupon' )->with( $result );
        } else {
            return redirect( 'admin/coupon' );
        }
    }

    public function update( Request $request, $id ) {
        $model = Coupon::find( $id );
        $model->title = $request->post( 'title' );
        $model->code = $request->post( 'code' );
        $model->value = $request->post( 'value' );
        $model->save();
        $request->session()->flash( 'message', 'updated coupon successfully' );
        return redirect( 'admin/coupon' );
    }
}
