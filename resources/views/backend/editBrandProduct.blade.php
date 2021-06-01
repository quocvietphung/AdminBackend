@extends('backend.adminLayout')
@section('admin-content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Brand
                </header>
                <div class="panel-body">
                    @foreach($editBrandProduct as $key => $editValue)
                        <div class="position-center">
                            <form role="form" action = "{{asset('/updateBrandProduct/'.$editValue->brandId)}}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Name of product </label>
                                    <input type="name" name="brandName" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Description </label>
                                    <textarea style="text-align:left; overflow:auto; resize: none" rows="8" class="form-control" name="brandDescription" id="exampleInputPassword1" placeholder="Description">
                                    {{$editValue->brandDescription}}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Display</label>
                                    <select name="categoryStatus" class="form-control input-sm m-bot15">
                                        <option value="0">Hide</option>
                                        <option value="1">Display</option>
                                    </select>
                                </div>

                                <button type="submit" name="addBrandProduct" class="btn btn-info">Update Brand</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
@endsection
