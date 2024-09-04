<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // echo 'hello';

        // return 'Hello';
        // return view('index');
        $title = 'Home page';
        $subtitle = '<i>Welcom</i>';
        $users = ['Tom', 'Bob', 'Tim'];

        return view('index', compact('title', 'subtitle', 'users'));
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        // dd($request->all());
        // dump($request);
        return 'sendEmail';
    }
}
