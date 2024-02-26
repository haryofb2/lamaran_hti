<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterController extends Controller
{
    //
    public function userall(Request $request) {

        $data = User::all()->count();

        return response()->json($data);
    }

    public function useractive(Request $request) {

        $data = User::where('users.user_status','!=',0)->count();

        return response()->json($data);
    }

    public function userdatatable(Request $request) {

        $user = User::where('users.user_status','!=',0)->get();

        if ($request->ajax()) {
            return datatables()->of($user)
            ->addIndexColumn()
            ->addcolumn('action', function ($data) {
                $li_kd_kas = trim($data->user_id);
                $action = '<div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a href="javascript:void(0);" class="btn btn-sm btn-success w-100" id="data_edit" data-id="'.$li_kd_kas.'">
                        Edit
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger w-100" id="data_hapus" data-id="'.$li_kd_kas.'">
                        Hapus
                    </a>
                </div>
            </div>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return response()->json($user);
    }

    public function userselect(Request $request) {

        $data = User::where('users.user_id',$request->user_id)->first();

        // $user['password_str'] = decrypt($user->password);

        // $coba = decrypt($request->user_id);
        // $coba = Hash::check($request->user_id);


        return response()->json($data);
    }

    public function useredit(Request $request) {

        $data = [
            'user_fullname' => $request->user_fullname,
            'user_email' => $request->user_email,
        ];

        User::where('users.user_id',$request->user_id)->update($data);

        return response()->json($data);
    }


    }

