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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|alpha|max:255',
            'phone' => 'required|numeric',
            'status' => 'required'
        ]);
        
        $user = Users::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alt_email = $request->alt_email;
        $user->phone = $request->phone;
        $user->status = $request->status;
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
