<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban\NomorSatu;

class AuthController extends Controller
{

    public function auth(Request $request)
    {

        $nomorSatu = new NomorSatu();
        return $nomorSatu->auth($request);
    }

    public function logout(Request $request)
    {

        $nomorSatu = new NomorSatu();
        return $nomorSatu->logout();
    }
}
