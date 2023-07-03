<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
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

            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('message')}}
                </div>
            @endif


        <div class="container m-0">
            <h1 class="text-center fs-1">Product List</h1>
            <table class="table-primary col-12 my-5" >
                <thead>
                  <tr class="border-bottom ">
                    <th scope="col" class="p-3">Product Name</th>
                    <th scope="col" class="p-3">Price</th>
                    <th scope="col" class="p-3">discount Price</th>
                    <th scope="col" class="p-3">Product Quentity</th>
                    <th scope="col" class="p-3">Product Image</th>
                    <th scope="col" class="p-3">Product Descraption</th>
                    <th scope="col" class="p-3">Category id</th>
                    <th scope="col" class="p-3">Operations</th>
                  </tr>
                </thead>
                <tbody>

                        @foreach ($data as $item)
                        <tr class="border-bottom">
                            <th scope="row" class="p-2 px-5"> {{$item->product_title}} </th>
                            <td class="p-2"> {{$item->price}} </td>
                            <td class="p-2"> {{$item->dis_price}} </td>
                            <td class="p-2"> {{$item->product_qnt}} </td>

                            <td class="p-2"> <img src="{{url('/product')}}/{{$item->image}}" alt="" width="100px" height="75px"> </td>

                            <td class="p-2"> {{$item->product_desc}} </td>
                            <td class="p-2"> {{$item->category_id}} </td>


                            <td class="p-2">
                                <a href="/edits_product/{{$item->id}}" class="btn btn-success my-4 uppercase p-2">Update</a>
                                <a href="/delete_product/{{$item->id}}" class="btn btn-danger uppercase p-2">delete</a>
                            </td>
                          </tr>
                        @endforeach
                </tbody>
              </table>
        </div>
        </div>
    </div>
    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>

