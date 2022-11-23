<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class HomeController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            return view('home');
        }

        public function userHome()
        {
            return view('home', ['msg' => 'I am a user']);
        }

        public function managerHome()
        {
            return view('home', ['msg' => 'I am a manager']);
        }

        public function adminHome()
        {
            return view('home', ['msg' => 'I am a admin']);
        }
    }
