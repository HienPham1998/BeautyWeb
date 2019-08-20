<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
class UserController extends Controller
{
    // Load list users
    public function index(Request $request) {
        $users = User::orderBy("created_at", "desc");
        if($request->search) {
            $users = $users->where(function($q) use ($request) {
                $q->where("name", "like", "%" . $request->search . "%")->orWhere("email", "like", "%" . $request->search . "%");
            });
        }
        $users = $users->where("role_id", 1)->paginate(10);
        $users->load("role");
        return view("admin.users.index", compact("users"));
    }
    public function create(){
        return view("admin.users.create");
    }
    public function store(StoreUser $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->role_id = 1;

        $user->save();

        session()->flash("success", "Add Successfully");
        return redirect("/manage/users");
    }
    public function update(UpdateUser $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role_id = 1;
        $user->save();
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
        $user = User::find($id);
        $user->delete();
        session()->flash("success", "Delete successfully");
        return back();
    }
}
