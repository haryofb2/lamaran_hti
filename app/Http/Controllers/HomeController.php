<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('content.dashboard');
    }

    public function user(Request $request) {

        return view('content.user');

    }

    public function store(Request $request) {

        $user = new User();
        $user->user_fullname = $request->user_fullname_add;
        $user->user_email = $request->user_email_add;
        $user->user_status = 1;
        $user->password = Hash::make($request->user_fullname_add);
        $user->save();

        return redirect('/user_list');

        // return response()->json($user);

    }

    public function delete(Request $request) {
        $user = User::where('users.user_id',$request->user_id_delete)->first();
        $user->user_status = 0;
        $user->save();

        return redirect('/user_list');

    }
}
