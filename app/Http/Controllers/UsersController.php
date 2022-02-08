<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function records()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('users.user-records', compact('users'));
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('users.user-information', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('users.create-user', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $formData = $request->all();

        User::create($formData);

        return redirect()->route('users.index')->with('message', 'User created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show-users', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $groups = Group::all();
        return view('users.edit-user', compact('users', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'group_id' => 'required',
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $user->name         = $request->name;
        $user->group_id     = $request->group_id;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->address      = $request->address;

        $user->save();

        return redirect()->route('users.index')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('message', 'User removed successfully');

    }

    // public function searchUser(Request $request)
    // {
    //     $search_text = $request->get('query');
    //     $users = User::where('name', 'LIKE', '%'.$search_text.'%')->with('group')->get();

    //     return view('users.user-information', compact('users'));
    // }
}
