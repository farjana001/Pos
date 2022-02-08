<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchUser(Request $request)
    {
        $search_text = $request->get('query');
        $users = User::where('name', 'LIKE', '%'.$search_text.'%')->with('group')->get();

        return view('users.user-information', compact('users'));
    }
}
