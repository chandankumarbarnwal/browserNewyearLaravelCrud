<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;


class Users extends Controller
{
    public function list()
    {
       // $loginData = Session::get('loginData');
    	$user = User::all();

        return view('userlist', ['user'=>$user]);
    }

    public function create()
    {
    	return view('create');
    }

    public function loginsubmit(Request $req)
    {
        User::SELECT('*')->where([
              ['email', '=', $req->email],
             ['password', '=', $req->password],

        ])->get();
        Session::put('loginData', $req->input());
        // $req->session()->put('loginData', $req->input());
        return redirect('list');

    }

    public function createsubmit(Request $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $result = $user->save();

        if ($result) {
            Session::put('loginData', $req->input());
            return redirect('list');
        }

    }


}