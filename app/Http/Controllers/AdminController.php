<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$data['mainTitle'] = 'Dashboard';
    	$data['firstPage'] = 'Admin';
    	$data['secondPage'] = 'Dashboard';
        return view('admin.home', $data);
    }
}
