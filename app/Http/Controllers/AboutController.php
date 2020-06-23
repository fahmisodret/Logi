<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Services\AboutService;
use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
	public function index(){
		$data['data'] = About::all();
		return view('admin.about.index', $data);
	}

	public function create(){
		return view('admin.about.create');
	}

	public function store(AboutRequest $request, AboutService $aboutService){
		$aboutService->store($request);
		return redirect()->back();
	}

	public function edit($id){
		$data['data'] = About::find($id);
		return view('admin.about.edit', $data);
	}

	public function update(AboutRequest $request, AboutService $aboutService, $id){
		$data = $aboutService->update($request, $id);
		return redirect()->back();
	}

	public function destroy(Request $request, AboutService $aboutService, $id){
		$data = $aboutService->destroy($id);
		return redirect()->back();
	}
}
