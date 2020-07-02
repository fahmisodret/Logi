<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Fasilitas;
use App\ProjectDetail;
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
		$data['project'] = Project::select('id', 'title')->get();
		$data['detail'] = ProjectDetail::with('project')->get();
		$data['fasilitas'] = Fasilitas::with('project')->get();
		return view('admin.galery.create', $data);
	}

	public function store(GaleryRequest $request, GaleryService $galeryService){
		$galeryService->store($request->getValidRequest());
		return redirect()->back();
	}

	public function edit($id){
		$data['project'] = Project::select('id', 'title')->get();
		$data['detail'] = ProjectDetail::select('id', 'title')->get();
		$data['fasilitas'] = Fasilitas::select('id', 'name')->get();
		$data['data'] = Galery::find($id);
		return view('admin.galery.edit', $data);
	}

	public function update(GaleryRequest $request, GaleryService $galeryService, $id){
		$data = $galeryService->update($request->getValidRequest(), $id);
		return redirect()->back();
	}

	public function destroy(Request $request, GaleryService $galeryService, $id){
		$data = $galeryService->destroy($id);
		return redirect()->back();
	}
}
