<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fasilitas;
use App\Project;
use App\Http\Requests\Fasilitas\FasilitasCreateRequest;
use App\Http\Requests\Fasilitas\FasilitasUpdateRequest;
use Storage;

class FasilitasController extends Controller
{
	public function index(){
		$data['data'] = Fasilitas::all();
		return view('admin.fasilitas.index', $data);
	}

	public function create(){
		$data['project'] = Project::where('is_progres', 0)->get();
		return view('admin.fasilitas.create', $data);
	}

	public function store(FasilitasCreateRequest $request){
		Fasilitas::create($request->getValidRequest());
		return redirect()->back();
	}

	public function edit($id){
		$data['project'] = Project::where('is_progres', 0)->get();
		$data['data'] = Fasilitas::find($id);
		return view('admin.fasilitas.edit', $data);
	}

	public function update(FasilitasUpdateRequest $request, $id){
		$data = Fasilitas::find($id);
		if($request->has('image')){
			Storage::delete('/public/upload/fasilitas/'.$data->image);
		}
		$data->update($request->getValidRequest());
		return redirect()->back();
	}

	public function destroy(Request $request, $id){
		$data = Fasilitas::find($id);
		Storage::delete('/public/upload/fasilitas/'.$data->image);
		$data = Fasilitas::destroy($id);
		return redirect()->back();
	}
}
