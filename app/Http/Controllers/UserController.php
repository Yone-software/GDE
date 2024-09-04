<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logout() {
        auth()->logout();
        return redirect('/');
    }
    
    public function login(Request $request) {
        $campos = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);
    
    if (auth()->attempt(['username' => $campos['loginusername'], 'password' => $campos['loginpassword']])) {
        $request->session()->regenerate();
        return redirect('/');
    }
    }
}
