<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function userEdit(Request $request) {

        $inputs = $request->all();
        $user = Auth::user();
        // dd($request);
        // $user->fill([
        //     'name' => $inputs['name'],
        //     'prof' => $inputs['prof'],
        // ]);
        $user->name=$inputs['name'];
        $user->prof=$inputs['prof'];
        if(request('image')) {
            $original= request()->file('image')->getClientOriginalName();
            $name= date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $user->image= $name;
        }
        $user->save();
        return redirect('/');
    }
}
