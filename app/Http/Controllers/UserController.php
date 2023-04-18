<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function userEditShow($id) {
        $user = User::find($id);

        return view('content.user_edit', [
            'user' => $user
        ]);
    }

    public function userEdit(Request $request) {

        // $inputs = $request->all();
        // $user = Auth::user();
        // // dd($request);
        // // $user->fill([
        // //     'name' => $inputs['name'],
        // //     'prof' => $inputs['prof'],
        // // ]);
        // $user->name=$inputs['name'];
        // $user->email=$inputs['email'];
        // $user->prof=$inputs['prof'];
        // // if(request('image')) {
        // //     $original= request()->file('image')->getClientOriginalName();
        // //     $name= date('Ymd_His').'_'.$original;
        // //     request()->file('image')->move('storage/images', $name);
        // //     $user->image= $name;
        // // }
        // $user->save();

        $inputs = $request->all();
        $user = User::find($request->id);

        $user->fill([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'prof' => $inputs['prof'],
            'role' => $inputs['role'],
        ]);

        $user->save();

        return redirect('/users');
    }

    public function users_show(Request $request) {
        $users = DB::table('users')->get();
        $users = User::all();
        return view('content.users_show', compact('users'));
    }

    public function delete($id)  {
        // if (empty($id)) {
        //     \Session::flash('err_msg', 'データがありません');
        //     return redirect(route('content'));
        // }
        $users = User::destroy($id);
        return redirect('users');
    }
}
