<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProvider ;
use App\Http\Requests\UpdateProvider ;
use App\Provider;


class ProviderController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $providers = Provider::orderBy("created_at", "desc");
        if($request->search) {
            $providers = $providers->where("name", "like", "%" . $request->search . "%")->orWhere("email", "like", "%" . $request->search . "%");
        }
        $providers = $providers->paginate(10);
        return view("admin.providers.index", compact("providers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.providers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvider $request)
    {
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        
        $provider->save();

        session()->flash("success", "Add Successfully");
        return redirect("/manage/providers");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvider $request, $id)
    {
        $provider = Provider::find($id);
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->address = $request->address;
        $provider->phone = $request->phone;
        
        $provider->save();
        session()->flash("success", "Update Successfully");
         return back();
    }
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        session()->flash("success", "Delete successfully");
        return back();
    }
}
