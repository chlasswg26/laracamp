<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('auth.passwords.change');
    }

    public function changepassword(Request $request){
        $rules = [
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ];

        $ruleMessages = [
            'required' => 'Bidang isian :attribute dibutuhkan!'
        ];

        $this->validate($request, $rules, $ruleMessages);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            return redirect()->route('login')->with('pesanSukses', "Password is change Successfully");
        } else {
            return redirect()->back()->with('pesanGagal', "Current Password is Invalid");
        }
    }
}
