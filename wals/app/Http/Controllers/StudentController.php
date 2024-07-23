<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

  public function pythoncourse() {
    return view('student/pythoncourse/main');
  }

}
