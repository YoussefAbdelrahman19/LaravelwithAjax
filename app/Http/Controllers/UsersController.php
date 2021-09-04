<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequestStore;
use App\Models\User;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    public function index() 
    {
        $users=User::filter(request(['search', 'gender']))->paginate(40)->withQueryString();
        return view('users.index',compact('users'));
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $users = User::filter(request(['search', 'gender']))->paginate(50)->withQueryString();
            return view('users.index', compact('users'))->render();
        }
    }

    public function show(User $user) {
        return view('users.show',compact('user'));
    }

    public function edit($user_id) {
        $user = User::find($user_id);
        return response()->json($user);
    }

    public function update(UserRequestStore $request) {
        $user = User::find($request->id);
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy($user_id) {
        $user = User::find($user_id);
        $user->delete();
        return response()->json(['Success'=>'User deleted successfully']);
    }



}
