@extends('backend.adminLayout')
@section('admin-content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit
                </header>
                <div class="panel-body">
                    @foreach($editProduct as $key => $product)
                        <div class="position-center">
                            <form role="form" action = "{{asset('/updateProduct/'.$product->productId)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name of product </label>
                                    <input type="name" value="{{$product->productName}}" name="productName" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Price </label>
                                    <input type="name" value="{{$product->productPrice}}" name="productPrice" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Image </label>
                                    <input type="file" value="{{$product->productImage}}" name="productImage" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Description </label>
                                    <textarea style="text-align:left; overflow:auto; resize: none" rows="8" class="form-control" name="productDescription" id="exampleInputPassword1" placeholder="Description">
                                    {{$product->productDescription}}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content</label>
                                    <textarea style="text-align:left; overflow:auto; resize: none" rows="8" class="form-control" name="productContent" id="exampleInputPassword1" placeholder="Description">
                                    {{$product->productDescription}}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Category</label>
                                    <select name="productCategory" class="form-control input-sm m-bot15">
                                        @foreach($categoryProduct as $key => $category)
                                            @if($category->categoryId == $product->categoryId)
                                            <option selected value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                                            @else
                                            <option value="{{$category->categoryId}}">{{$category->categoryName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Brand</label>
                                    <select name="productBrand" class="form-control input-sm m-bot15">
                                        @foreach($brandProduct as $key => $brand)
                                            @if($brand->brandId == $product->brandId)
                                                <option selected value="{{$brand->brandId}}">{{$brand->brandName}}</option>
                                            @else
                                                <option value="{{$brand->brandId}}">{{$brand->brandName}}</option>>
                                            @endif
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

                                <button type="submit" name="updateProduct" class="btn btn-info">Update Product</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
@endsection
