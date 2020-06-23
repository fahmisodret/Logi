<?php

namespace App\Http\Controllers;

use Services\TestService;
use Illuminate\Http\Request;
use App\About;
use App\Project;
use App\Galery;

class FrontController extends Controller
{
	public function index(){
		return view('front.pages.index');
	}

	public function about(){
		$data['data'] = About::all();
		return view('front.pages.about', $data);
	}

	public function project(){
		$data['data'] = Project::all();
		return view('front.pages.project', $data);
	}

	public function galery(){
		$data['data'] = Galery::all();
		return view('front.pages.galery', $data);
	}

	public function contact(){
		return view('front.pages.contact');
	}
}
