<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PrincipalController extends Controller
{
    public function login(){
        return view('vistas.login');
    }

    public function validador(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('inicio');
    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden.',
    ]);
    }

    public function inicio(){
        return view("vistas.inicio");
    }

    public function contacto(){
        return view("vistas.contacto");
    }

    public function registro(){
        return view('vistas.register');
    }

    public function useradd(Request $request)
    {
        $comp = new User();
        $comp->name = $request->name;
        $comp->email = $request->email;
        $comp->email_verified_at = now();
        $comp->password = Hash::make($request->password);
        $comp->remember_token = Str::random(10);
        $comp->save();
        return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
