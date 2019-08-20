<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
class BillController extends Controller
{
    public function index(Request $request){
        $bills = Bill::orderBy("created_at","desc");
        if($request->search) {
            $bills = $bills->where("created_at", "like", "%" . $request->search . "%");
        }
        $bills = $bills->paginate(10);
        return view('admin.bills.index',compact('bills'));
    }
    public function getBillDetail($bill_id,Request $request){
        $detail = BillDetail::where("bill_id",$bill_id)->get();
        return view('admin.bills.billdetail',compact('detail'));
    }
    // public function update($id,Request $request){
    //     $bill = Bill::find($id);
    //     $bill->customer_id = $request->customer_id;
    //     $bill->total = $request->total;
    //     $bill->created_at = $request->created_at;       
    //     $bill->save();
        
    //     session()->flash("success","Update Successfully");
    //     return redirect('manage/bills');
    // }   
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request,$id){
    //     $bill = Bill::find($id);
    //     $billDetail = BillDetail::where('bill_id',$id);
    //     $billDetail->delete();
    //     $bill->delete();
    //     session()->flash("success","Delete Successfully");
    //     return redirect("manage/bills");
    // }
}
