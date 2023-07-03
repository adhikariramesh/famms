<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style>
    .h1_font{
        font-size: 22px;
        text-transform: capitalize;
        color: yellowgreen;
        position: relative;
    }
    .h1_font::after{
        content: "";
        width: 100%;
        height: 1px;
        background:rgb(112, 43, 43);
        position: absolute;
        bottom: -20px;
        left: 0;
    }
    select{
        border: none;
        outline: none;
        font-size: 22px;
        color: black;
        background:none;
    }
    option{
        color: black;
    }

  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        <div class="main-panel">

            <div class="content-wrapper">

                <div class="container m-2">

                    <h1 class="text-center fs-1 h1_font">Add product</h1>

                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>
                    @endif

                    <form action="{{url('/add_product')}}" method="POST" class="my-5" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 flex ">
                        <div class="col-5">
                          <label for="exampleInputEmail1" class="form-label"> Product Title</label>
                          <input type="text" name="product_title" class="form-control" id="exampleInputcategory" value="" >
                        </div>
                        <div class="col-5">
                          <label for="exampleInputpricse" class="form-label"> Price</label>
                          <input type="number" name="price" class="form-control " id="exampleInputcategory" value="" >
                        </div>
                        </div>

                        <div class="mb-3 flex ">
                        <div class="col-5">
                          <label for="exampleInputEmail1" class="form-label"> discount Price</label>
                          <input type="number" name="dis_price" class="form-control" id="exampleInputcategory" value="" >
                        </div>
                        <div class="col-5">
                          <label for="exampleInputpricse" class="form-label"> product Quentity</label>
                          <input type="number" name="product_qnt" class="form-control " id="exampleInputcategory" value="" >
                        </div>
                        </div>
                        <div class="mb-3 flex ">
                            <div class="col-5">
                                <label for="exampleInputpricse" class="form-label"> product Description</label>
                                <textarea class="form-control"  name="desc" id="desc" cols="50" rows="5"></textarea>
                            </div>
                            <div class="col-5">
                                <label for="exampleInputpricse" class="form-label"> Imapge</label>
                                <input type="file" name="image" class="form-control " id="exampleInputcategory" value="" >
                            </div>
                        </div>


                        <div class="mb-3 flex ">
                            <div class="col-5">
                                <label for="exampleInputpricse" class="form-label"> Select Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option class="form-control" value="" selected="selected" >Select category</option>
                                    @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                      </form>
                </div>
            </div>
        </div>









    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>
