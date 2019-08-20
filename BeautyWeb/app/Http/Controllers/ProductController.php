<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Provider;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Image;
use Validator;
class ProductController extends Controller
{
     //
     public function index(Request $request) {
        $products = Product::orderBy("created_at", "desc");
        if($request->search) {
            $products = $products->where("name", "like", "%" . $request->search . "%")->orWhere("description", "like", "%" . $request->search . "%");
        }
        $products = $products->paginate(10);
        $products->load('category');
        $products->load('provider');
        return view("admin.products.index", compact("products"));
    }
    public function create(){
        $categories = Category::all();
        $providers = Provider::all();
        return view("admin.products.create",compact('categories','providers'));
    }
    public function store(StoreProduct $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->provider_id = $request->provider_id;
        $product->promotion_price = $request->promotion_price;
        $product->unit_price = $request->unit_price;
        $product->quantity = $request->quantity;

        if($request->hasFile('file'))
        {
            $img = $request->file('file');

            $filename = time().'.'.$img->getClientOriginalExtension();

            Image::make($img)->resize(500, 500)->save(public_path('/client/assets/image'.$filename));
            $product->image = '/client/assets/image' . $filename;

        }
        $product->description = $request->description;
        $product->save();

        session()->flash("success", "Insert Successfully");
        return redirect("/manage/products");
    }
    public function update(UpdateProduct $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->provider_id = $request->provider_id;
        $product->promotion_price = $request->promotion_price;
        $product->unit_price = $request->unit_price;
        $product->quantity = $request->quantity;
        if($request->hasFile('file'))
        {
            $img = $request->file('file');

            $filename = time().'.'.$img->getClientOriginalExtension();

            Image::make($img)->resize(500, 500)->save(public_path('/client/assets/image'.$filename));
            $product->image = '/client/assets/image' . $filename;

        }
        $product->description = $request->description;
        $product->save();
        session()->flash("success", "Update Successfully");
         return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash("success", "Delete successfully");
        return back();
    }
}
