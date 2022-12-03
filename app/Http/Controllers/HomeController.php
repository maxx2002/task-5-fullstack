<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'articles' => articles::all(),
            'categories' => categories::all(),
            'users' => User::all()
        ]);
    }
}
