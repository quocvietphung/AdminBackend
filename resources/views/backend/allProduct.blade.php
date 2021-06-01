@extends('backend.adminLayout')
@section('admin-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of Product
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message= \Illuminate\Support\Facades\Session::get('message');
                if($message){
                    echo  '<span class= "text-alert">'.$message.'</span>' ;
                    \Illuminate\Support\Facades\Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allProduct as $key => $product)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{$product->productName}}</td>
                            <td>{{$product->productPrice}}</td>
                            <td><img src="/uploads/product/{{$product->productImage}}" height="100" width="100"></td>
                            <td>{{$product->categoryName}}</td>
                            <td>{{$product->brandName}}</td>

                            <td><span class="text-ellipsis">
                            <?php
                                    if ($product->productStatus==0) {
                                    ?>
                             <a href ="{{asset('/unactiveProduct/'.$product->productId)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                            <?php
                                    }else{
                                    ?>
                              <a href ="{{asset('/activeProduct/'.$product->productId)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                            <?php
                                    }
                                    ?>
                            </span>
                            </td>
                            <td>
                                <a href ="{{asset('/editProduct/'.$product->productId)}}" class="active styling-edit" ui-toogle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Are you sure to delete this product?')" href ="{{asset('/deleteProduct/'.$product->productId)}}" class="active styling-edit" ui-toogle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
