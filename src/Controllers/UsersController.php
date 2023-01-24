<?php

namespace Jalpeshtxtech\Users\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Jalpeshtxtech\Users\Models\Users;
use Illuminate\Http\Request;
use Jalpeshtxtech\Users\Requests\UsersRequest;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index()
    {
        $data = Users::all();
        // $data = array('category1','category2','category3','category4','category5');

        return view('users::index', compact('data'));
    }

    public function add()
    {
        return view('users::add');
    }

    public function store(UsersRequest $request)
    {
        $user = Users::create($request->all());
        return redirect()->route('users.list')->with('success','User Created Successfully!');
    }

    public function edit($id)
    {
        $data = Users::findOrFail($id);
        return view('users::add', compact('data'));
    }

    public function update(UsersRequest $request, $id)
    {
        // echo "<pre>".$id;print_r($request->all());die;
        $user = Users::findOrFail($id);

        // $user->category_name = $request->category_name;
        // $user->description = $request->description;

        $user->save();
        // $user = Category::create($request->all());
        return redirect()->route('users.list')->with('success','User Updated Successfully!');
    }

    public function destroy($id)
    {
        $data = Users::where('id',$id)->delete();
        return redirect()->route('users.list')->with('success','User Deleted Successfully!');
    }
}
