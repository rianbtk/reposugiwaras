<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class TeacherController extends Controller
{
  public function index() {
    return view('teacher/home');
  }
}
