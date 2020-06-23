<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galery;
use Services\GaleryService;
use App\Http\Requests\GaleryRequest;

class GaleryController extends Controller
{
	public function index(){
		$data['data'] = Galery::all();
		return view('admin.galery.index', $data);
	}

	public function create(){
		return view('admin.galery.create');
	}

	public function store(GaleryRequest $request, GaleryService $galeryService){
		$galeryService->store($request);
		return redirect()->back();
	}

	public function edit($id){
		$data['data'] = Galery::find($id);
		return view('admin.galery.edit', $data);
	}

	public function update(GaleryRequest $request, GaleryService $galeryService, $id){
		$data = $galeryService->update($request, $id);
		return redirect()->back();
	}

	public function destroy(Request $request, GaleryService $galeryService, $id){
		$data = $galeryService->destroy($id);
		return redirect()->back();
	}
}
