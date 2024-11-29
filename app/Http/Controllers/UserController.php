<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{

    public function register(Request $request):RedirectResponse
    {
        $user = $request->validate([
            'name'=>'required',
                'surname'=>'required',
                'tel'=>['required'],
                'email'=>['required'],
                'password'=>['required'],
            ]
        );
       User::query()->create([
            'name'=>$request->name,
            'surname' => $request->surname,
            'tel'=> $request->tel,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('index');
    }

    public function login(Request $request):RedirectResponse
    {
        if(is_numeric($request->loginauth)){
            if (Auth::attempt([
                'tel' => $request->loginauth,
                'password' => $request->passwordauth
            ])) {

                $request->session()->regenerate();
                if (Auth::user()->admin){
                    return redirect()->route('admin');
                }
                else
                {
                    return redirect()->route('profile');
                }

            }
        }
        elseif (filter_var($request->loginauth,FILTER_VALIDATE_EMAIL)){
            if (Auth::attempt([
                'email' => $request->loginauth,
                'password' => $request->passwordauth
            ])) {

                $request->session()->regenerate();
                if (Auth::user()->admin){
                    return redirect()->route('admin');
                }
                else
                {
                    return redirect()->route('profile');
                }

            }
        }

           return redirect()->route('index');
    }

    public function logout(Request $request):RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }

    public function profile(Request $request):View
    {
        $user = User::query()->firstWhere('id',$request->user()->id);
        return view('profile',compact('user'));
    }
}
