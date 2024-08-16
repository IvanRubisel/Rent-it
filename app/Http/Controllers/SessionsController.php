<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store()
    {
        if(auth()->attempt(request(['email', 'password'])) == false){
            return back()->withErrors([
                'message' => 'Las credenciales no coinciden con nuestros registros',
            ]);
        }

        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.index');
        }


        return redirect()->to('/');

    }


    public function destroy()
    {
        auth()->logout();
        Auth::logout();
        return redirect()->to('/');

    }
}
