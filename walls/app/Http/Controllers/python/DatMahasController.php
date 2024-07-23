<?php


namespace App\Http\Controllers\python;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatMahasController extends Controller
{
    public function index()
    {
        $datmahas = DB::table('users')
        ->where('levelid', 2)
        ->select('id', 'name', 'email', 'status_id')
        ->get();

        $datmahas = $datmahas->map(function ($user, $index) {
            $user->nomor = $index + 1;
            return $user;
        });
        
        return view('teacher.python.dat_mahas', compact('datmahas'));
    }
    
}