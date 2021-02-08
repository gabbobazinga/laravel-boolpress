<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function logged() {
        $user = Auth::user();
        return view('commons.hello', compact('user'));
    }

    public function guest() {
        $user = Auth::user();
        return view('commons.hello');
    }
}
