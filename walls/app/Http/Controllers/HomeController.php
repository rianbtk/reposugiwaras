<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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

     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->status == 'student') {
            $check = \App\StudentTeacher::where('student', '=', Auth::user()->id);
            return view('/student/pythoncourse/home')->with(['count' => $check->count()]);
        } else if (Auth::user()->status == 'admin') {
            return view('/admin/admin');
        } else {
            return view('/teacher/home');
        }

    }
}
