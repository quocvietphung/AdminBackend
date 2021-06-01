<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BrandProduct extends Controller
{
    public function addBrandProduct() {
        return view('backend/addBrandProduct');
    }

    public function allBrandProduct() {
        $addBrandProduct =  DB::table('brandProduct')->get();
        $managerBrandProduct = view('backend/allBrandProduct')
            ->with('allBrandProduct',$addBrandProduct);
        return view('backend/adminLayout')->with('backend/allBrandProduct',$managerBrandProduct);
    }

    public function saveBrandProduct(Request $request) {
        $data = array() ;
        $data['brandName'] = $request->brandName;
        $data['brandDescription'] = $request->brandDescription;
        $data['brandStatus'] = $request->brandStatus;

        DB::table('brandProduct')->insert($data);
        Session::put('message','Brand were added in the list');
        return Redirect::to('allBrandProduct');
    }
    public function unactiveBrandProduct($BrandProductId) {
        DB::table('brandProduct')->where('brandId',$BrandProductId )
            ->update(['brandStatus'=> 1]);
        Session::put('message','Brand were actived not success in the list');
        return Redirect::to('allBrandProduct');
    }
    public function activeBrandProduct($BrandProductId) {
        DB::table('brandProduct')->where('brandId',$BrandProductId )
            ->update(['brandStatus'=> 0]);
        Session::put('message','Brand were actived success in the list');
        return Redirect::to('allBrandProduct');
    }
    public function editBrandProduct($BrandProductId) {
        $editBrandProduct = DB::table('brandProduct')->where('brandId',$BrandProductId )
            ->get();
        $managerBrandProduct = view('backend/editBrandProduct')
            ->with('editBrandProduct',$editBrandProduct);
        return view('backend/adminLayout')->with('backend/editBrandProduct',$managerBrandProduct);
    }
    public function deleteBrandProduct($BrandProductId) {
        DB::table('brandProduct')->where('brandId',$BrandProductId)
            ->delete();
        Session::put('message','delete success');
        return Redirect::to('allBrandProduct');
    }
    public function updateBrandProduct(Request $request, $BrandProductId) {
        $data = array() ;
        $data['brandName'] = $request->brandName;
        $data['brandDescription'] = $request->brandDescription;
        DB::table('brandProduct')->where('brandId',$BrandProductId)
            ->update($data);
        Session::put('message','Update success');
        return Redirect::to('allBrandProduct');
    }
}
