<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class adminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        $title = "Add Category";
        return view('admin.category', compact('data','title'));
    }

    public function addCategory(Request $request){
            $addCategorys = new Category;
            $addCategorys->category_name = $request['category'];
            $addCategorys->save();

             return redirect()->back()->with('message',"Category added succussfully");
    }

   public function deleteCategory($id){
      Category::find($id)->delete();
      return redirect()->back()->with('message',"Category deleted succussfully");
   }

   public function editCategory($id){
    $edit_data = Category::find($id);
    return view('admin.updateCategory');
   }
   public function updateCategory(){

   }

   public function addProduct(){
    $data = Category::all();
    return view('admin.addProduct',compact('data'));
   }
   public function addProductDb(Request $request){
        $product = new Product;
        $product->product_title = $request->product_title;
        $product->price = $request->price;
        $product->dis_price = $request->dis_price;
        $product->product_qnt = $request->product_qnt;
        $product->product_desc = $request->desc;

        $imgae = $request->image;
        $fileName = time().'.'. $imgae->getClientOriginalExtension();
        $request->image->move('product', $fileName);
        $product->image = $fileName;

        $product->category_id = $request->category;
        $product->save();
        return redirect()->back()->with('message',"Product added succussfully");

   }

   public function showProduct(){
     $data = Product::all();
     return view('admin.showProduct', compact('data'));
   }
   public function deleteProduct($id){
        Product::find($id)->delete();
        return redirect()->back()->with('message','Product deleted successfully');;
   }

   public function editsProduct($id){
    $category = Category::all();
     $product = Product::find($id);
     $data = compact('category','product');
     return view('admin.updateProduct')->with($data);
   }


}
