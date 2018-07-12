<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');
    }
    public function store(Request $request)
    {
        $credentials = $this->validate($request,[
           'email'=>'required|email|max:255',
            'password'=>'required',
        ]);

     
        if(Auth::attempt($credentials,$request->has('remember'))) {
            session()->flash('success','登陆成功');
            return redirect()->route('user.show',[Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }
    public function destroy()
    {
        Auth::logout();
        session()->flash('success','退出登陆成功');
        return redirect(route('login'));
    }
}
