<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function addProduct() {
        $categoryProduct = DB::table('categoryProduct')
                                    ->orderBy('categoryId','desc')
                                    ->get();
        $brandProduct = DB::table('brandProduct')
                                ->orderBy('brandId','desc')
                                ->get();
        return view('backend/addProduct')
                    ->with('categoryProduct',$categoryProduct)
                    ->with('brandProduct', $brandProduct) ;
    }

    public function allProduct() {
        $addProduct =  DB::table('product')->join('categoryProduct','categoryProduct.categoryId','=','product.categoryId')
                                                 ->join('brandProduct','brandProduct.brandId','=','product.brandId')
                                                 ->orderBy('product.productId','desc')
                                                 ->get();
        $managerCategoryProduct = view('backend/allProduct')
            ->with('allProduct',$addProduct);
        return view('backend/adminLayout')->with('backend/allCategoryProduct',$managerCategoryProduct);
    }

    public function saveProduct(Request $request) {
        $data = array() ;
        $data['productName'] = $request->productName;
        $data['productPrice'] = $request->productPrice;
        $data['productDescription'] = $request->productDescription;
        $data['productContent'] = $request->productContent;
        $data['categoryId'] = $request->productCategory;
        $data['brandId'] = $request->productBrand;
        $data['productStatus'] = $request->productStatus;
        $getImage = $request->file('productImage');

        if ($getImage) {
              $getNameImage = $getImage->getClientOriginalName();
              $nameImage = current(explode('.',$getNameImage));
              $newImage = $nameImage.rand(0,99).'.'.$getImage->getClientOriginalExtension();
              $getImage->move('uploads/product',$newImage);
              $data['productImage'] = $newImage ;
              DB::table('product')->insert($data) ;
              Session::put('message','Added Image');
              return Redirect::to('allProduct');
        }
        $data['productImage'] = '';
        DB::table('product')->insert($data);
        Session::put('message','Category were added in the list');
        return Redirect::to('allProduct');
    }
    public function unactiveProduct($productId) {
        DB::table('product')->where('productId',$productId )
            ->update(['productStatus'=> 1]);
        Session::put('message','Product were  actived success in the list');
        return Redirect::to('allProduct');
    }
    public function activeProduct($productId) {
        DB::table('product')->where('productId',$productId )
            ->update(['productStatus'=> 0]);
        Session::put('message','Product were unactived success in the list');
        return Redirect::to('allProduct');
    }
    public function editProduct($productId) {
        $categoryProduct = DB::table('categoryProduct')
            ->orderBy('categoryId','desc')
            ->get();
        $brandProduct = DB::table('brandProduct')
            ->orderBy('brandId','desc')
            ->get();
        $editProduct = DB::table('product')->where('productId',$productId )
                                                 ->get();

        $managerProduct = view('backend/editProduct')
                                                ->with('editProduct',$editProduct)
                                                ->with('categoryProduct',$categoryProduct)
                                                ->with('brandProduct',$brandProduct);

        return view('backend/adminLayout')->with('backend/editProduct',$managerProduct);
    }
    public function deleteProduct($productId) {
        DB::table('product')->where('productId',$productId)
            ->delete();
        Session::put('message','delete success');
        return Redirect::to('allProduct');
    }
    public function updateProduct(Request $request, $productId) {
        $data = array() ;
        $data['productName'] = $request->productName;
        $data['productPrice'] = $request->productPrice;
        $data['productDescription'] = $request->productDescription;
        $data['productContent'] = $request->productContent;
        $data['categoryId'] = $request->productCategory;
        $data['brandId'] = $request->productBrand;
        $data['productStatus'] = $request->productStatus;
        $getImage = $request->file('productImage');

        if ($getImage) {
            $getNameImage = $getImage->getClientOriginalName();
            $nameImage = current(explode('.',$getNameImage));
            $newImage = $nameImage.rand(0,99).'.'.$getImage->getClientOriginalExtension();
            $getImage->move('uploads/product',$newImage);
            $data['productImage'] = $newImage ;
            DB::table('product')->where('productId',$productId)->update($data) ;
            Session::put('message',' Update image success');
            return Redirect::to('addProduct');
        }
        DB::table('product')->where('productId',$productId)
            ->update($data);
        Session::put('message','Update success');
        return Redirect::to('allProduct');
    }
}
