<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
    public function index() {
        $groups = Group::all();
        return view('groups.groups', compact('groups'));
    }

    public function create() {
        return view('groups.create-group');
    }

    public function store(Request $request) {
        $formData = $request->all();

        return $formData;
    }
}
