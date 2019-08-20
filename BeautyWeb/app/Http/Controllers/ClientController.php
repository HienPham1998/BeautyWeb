<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Shippingaddress;
use App\Bill;
use App\Billdetail;
use Auth;
use Session;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        $products = Product::orderBy("created_at","desc");
        if($request->search) {
            $products = $products->where("name", "like", "%" . $request->search . "%")->orWhere("description", "like", "%" . $request->search . "%");
        }
        $products = $products->paginate(20);
        return view('client.index',compact("categories","products"));  
    }
    public function getProductbyCategory($category_id,Request $request){
        $categories = Category::all();
        $products = Product::where("category_id", $category_id)->paginate(20);
        return view('client.index',compact("categories","products"));
    }
    public function getBill($customer_id,Request $request){
        $shippingaddress = Shippingaddress::where("customer_id",$customer_id)->orderBy("created_at", "desc")->first();
        $products = \Cart::content();
        return view('client.bill',compact('shippingaddress','products'));
    }
    public function getCart(){
        
        $categories = Category::all();
        $products = \Cart::content();
        return view('client.cart',compact("categories", "products"));
    }

    public function addToCart($id, Request $request) {
        $product = Product::find($id);
        if ($product) {
            \Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' =>$product->unit_price,
                'weight' => 0,
                'options' => [
                    'image' => $product->image,
                    'promotion_price'=> $product->promotion_price
                ]
            ]);
        }
        session()->flash("success","This product has been add to the cart");
        return redirect()->back();
    }
    public function buy($id, Request $request) {
        $product = Product::find($id);
        if ($product) {
            \Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' =>$product->unit_price,
                'weight' => 0,
                'options' => [
                    'image' => $product->image,
                    'promotion_price'=> $product->promotion_price
                ]
            ]);
        }
        session()->flash("success","This product has been add to the cart");
        return redirect('/cart');
    }

    public function removeFromCart($id, Request $request) {
        \Cart::remove($id);
        return redirect()->back();
    }
    public function addAddress(Request $request){
        $shippingaddress = new Shippingaddress();
        $shippingaddress->name = $request->name;
        $shippingaddress->phone = $request->phone;
        $shippingaddress->address = $request->address;
        $shippingaddress->customer_id =  Auth::user()->id;
        $shippingaddress->save();
        return redirect("/bills/" . Auth::user()->id);
    }
    public function updateAddress($id,Request $request){
        $shippingaddress = Shippingaddress::find($id);
        $shippingaddress->name = $request->name;
        $shippingaddress->phone = $request->phone;
        $shippingaddress->address = $request->address;
        $shippingaddress->customer_id =  Auth::user()->id;
        $shippingaddress->save();
        return redirect()->back();
    }
    public function getProductDetail($id,Request $request){
        $categories = Category::all();
        $product = Product::where("id", $id)->first();
        return view('client.productdetail',compact('categories','product'));
    }
    public function postBill(Request $request){
        $carts = \Cart::content();
        $bill = new Bill();
        $bill->customer_id = Auth::user()->id;
        $bill->total = \Cart::subTotal() + 2;

        $bill->save();

        foreach ($carts as $cart){
            
                $bill_detail = new Billdetail();
                $bill_detail->bill_id = $bill->id;
                $bill_detail->product_id = $cart->id; 
                $bill_detail->product_name = $cart->name;
                $bill_detail->quantity = $cart->qty;
                if($cart->options->promotion_price == 0)
                {
                    $bill_detail->price = $cart->price;
                }
                else
                    $bill_detail->price = $cart->options->promotion_price;
                $bill_detail->save();
                
                $product = Product::find($cart->id);
                if($product){
                    $product->name = $product->name;
                    $product->category_id = $product->category_id;
                    $product->provider_id = $product->provider_id;
                    $product->promotion_price = $product->promotion_price;
                    $product->unit_price = $product->unit_price;
                    $product->quantity = $product->quantity - $cart->qty;
                    $product->image = $product->image;
                    $product->description = $product->description;
                    $product->save();
                }
                else
                     return redirect()->back()->with('alert', 'Product does not exist');       
      
        }
       \Cart::destroy();
       session()->flash("success", "Order Successfully");
       return redirect('/');
    }


}
