@extends('backend.adminLayout')
@section('admin-content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Brand Product
                </header>
                <div class="panel-body">
                    <?php
                    $name= \Illuminate\Support\Facades\Session::get('adminName');
                    if($name){
                        //  echo $name;
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" action = "{{asset('/saveProduct')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Name of product </label>
                                <input type="name" name="productName" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type="name" name="productPrice" class="form-control" id="exampleInputEmail1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <input type="file" name="productImage" class="form-control" id="exampleInputEmail1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea style="text-align:left; overflow:auto; resize: none" rows="8" class="form-control" name="productDescription" id="exampleInputPassword1" placeholder="Description">
                            </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea style="text-align:left; overflow:auto; resize: none" rows="8" class="form-control" name="productContent" id="exampleInputPassword1" placeholder="Description">
                            </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Category</label>
                                <select name="productCategory" class="form-control input-sm m-bot15">
                                    @foreach($categoryProduct as $key => $category)
                                    <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Brand</label>
                                <select name="productBrand" class="form-control input-sm m-bot15">
                                    @foreach($brandProduct as $key => $brand)
                                        <option value="{{$brand->brandId}}">{{$brand->brandName}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Display</label>
                                <select name="productStatus" class="form-control input-sm m-bot15">
                                    <option value="0">Hide</option>
                                    <option value="1">Display</option>
                                </select>
                            </div>

                            <button type="submit" name="addProduct" class="btn btn-info">Add Product</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
@endsection
