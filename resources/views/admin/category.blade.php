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
          <div class="container m-2">
          <form action="{{url('/add_category')}}" method="POST">
            @csrf
            <div class="mb-3 ">
              <label for="exampleInputEmail1" class="form-label">{{$title}}</label>
              <input type="text" name="category" class="form-control col-5" id="exampleInputcategory" value="" >
            </div>
            <button type="submit" class="btn btn-primary">{{$title}}</button>
          </form>
        </div>


        <div class="container my-5">
            <h1 class="text-center fs-1">Category List</h1>
            <table class="table-primary col-10 m-5 " >
                <thead>
                  <tr class="border-bottom ">
                    <th scope="col" class="p-3 px-5">Category Id</th>
                    <th scope="col" class="p-3 px-5">Category Name</th>
                    <th scope="col" class="p-3 px-5">Operations</th>
                  </tr>
                </thead>
                <tbody>

                        @foreach ($data as $item)
                        <tr class="border-bottom">
                            <th scope="row" class="p-2 px-5"> {{$item->id}} </th>
                            <td class="p-2 px-5"> {{$item->category_name}} </td>
                            <td class="p-2 px-5">
                                <a href="/edit_category/{{$item->id}}" class="btn btn-success">Update</a>
                                <a href="/delete_category/{{$item->id}}" class="btn btn-danger">delete</a>
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
