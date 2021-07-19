<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\Users;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index() {
        $users = Users::getAllUsers(5);
        return view('admin.users.index', ['users' => $users]);
    }

    public function update($id) {
        $user = Users::find($id);
        return view('admin.users.update', ['user' => $user]);
    }

    public function save(Request $request, $id) {
        $user = Users::find($id);
        if ($request->isMethod('post')) {
            $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'password' => \Hash::make($request->post('password')),
                    'is_admin' => $request->post('is_admin'),
                ]
            );
            $user->save();
            return redirect()->route('admin.users.index');
        }
        return view('admin.users.update', ['user' => $user]);
    }
}
