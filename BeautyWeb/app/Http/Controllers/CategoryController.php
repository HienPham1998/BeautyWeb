<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    // Load list catagories
    public function index(Request $request) {
        $categories = Category::orderBy("created_at", "desc");
        if($request->search) {
            $categories = $categories->where("name", "like", "%" . $request->search . "%");
        }
        $categories = $categories->paginate(10);
        return view("admin.categories.index", compact("categories"));
    }
    public function create(){
        return view("admin.categories.create");
    }
    public function store(StoreCategory $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->note = $request->note;
        $category->save();

        session()->flash("success", "Insert Successfully");
        return redirect("/manage/categories");
    }
    public function update(UpdateCategory $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->note = $request->note;
        $category->save();
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
        $category = Category::find($id);
        $products = Product::where('category_id', $id);
        $products->delete();
        $category->delete();
        session()->flash("success", "Delete successfully");
        return back();
    }
}
