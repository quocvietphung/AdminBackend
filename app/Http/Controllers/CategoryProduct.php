<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryProduct extends Controller
{
    public function addCategoryProduct() {
        return view('backend/addCategoryProduct');
    }

    public function allCategoryProduct() {
        $addCategoryProduct =  DB::table('categoryProduct')->get();
        $managerCategoryProduct = view('backend/allCategoryProduct')
            ->with('allCategoryProduct',$addCategoryProduct);
        return view('backend/adminLayout')->with('backend/allCategoryProduct',$managerCategoryProduct);
    }

    public function saveCategoryProduct(Request $request) {
        $data = array() ;
        $data['categoryName'] = $request->categoryName;
        $data['categoryDescription'] = $request->categoryDescription;
        $data['categoryStatus'] = $request->categoryStatus;

        DB::table('categoryProduct')->insert($data);
        Session::put('message','Category were added in the list');
        return Redirect::to('allCategoryProduct');
        dd($data);
    }
    public function unactiveCategoryProduct($categoryProductId) {
        DB::table('categoryProduct')->where('categoryId',$categoryProductId )
            ->update(['categoryStatus'=> 1]);
        Session::put('message','Category were actived not success in the list');
        return Redirect::to('allCategoryProduct');
    }
    public function activeCategoryProduct($categoryProductId) {
        DB::table('categoryProduct')->where('categoryId',$categoryProductId )
            ->update(['categoryStatus'=> 0]);
        Session::put('message','Category were actived success in the list');
        return Redirect::to('allCategoryProduct');
    }
    public function editCategoryProduct($categoryProductId) {
        $editCategoryProduct = DB::table('categoryProduct')->where('categoryId',$categoryProductId )
            ->get();
        $managerCategoryProduct = view('backend/editCategoryProduct')
            ->with('editCategoryProduct',$editCategoryProduct);
        return view('backend/adminLayout')->with('backend/editCategoryProduct',$managerCategoryProduct);
    }
    public function deleteCategoryProduct($categoryProductId) {
        DB::table('categoryProduct')->where('categoryId',$categoryProductId)
            ->delete();
        Session::put('message','delete success');
        return Redirect::to('allCategoryProduct');
    }
    public function updateCategoryProduct(Request $request, $categoryProductId) {
        $data = array() ;
        $data['categoryName'] = $request->categoryName;
        $data['categoryDescription'] = $request->categoryDescription;
        DB::table('categoryProduct')->where('categoryId',$categoryProductId)
            ->update($data);
        Session::put('message','Update success');
        return Redirect::to('allCategoryProduct');
    }
}
