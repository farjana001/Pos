<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
    public function index() {
        $groups = Group::orderby('id', 'desc')->get();
        return view('groups.groups', compact('groups'));
    }

    public function create() {
        return view('groups.create-group');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);
        $formData = $request->all();

        Group::create($formData);

        return redirect()->route('index.user.group')->with('message', 'New user group created successfully');
    }

    public function edit($id) {
        $groups = Group::findOrFail($id);
        return view('groups.edit-group', compact('groups'));
    }
    public function update(Request $request, $id) {
        $groups = Group::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);

        $groups->title = $request->title;
        $groups->status = $request->status;

        $groups->save();
        return redirect()->route('index.user.group')->with('message', 'New user group updated successfully');
    }


    public function destroy($id) {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('index.user.group')->with('message', 'User group deleted successfully');
    }
}

