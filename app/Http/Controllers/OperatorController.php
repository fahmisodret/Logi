<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'operator']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$data['mainTitle'] = 'Dashboard';
    	$data['firstPage'] = 'Operator';
    	$data['secondPage'] = 'Dashboard';
        return view('operator.home', $data);
    }
}
