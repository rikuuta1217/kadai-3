<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    // クラスのインスタンスを作成する要素
use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use App\Models\Weight_log;
use App\Models\Weight_target;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class NewUserController extends Controller
{
    public function storeUser(RegisterRequest  $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);
        return redirect('/register2');
    }


}
