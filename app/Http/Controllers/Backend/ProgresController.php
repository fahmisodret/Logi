<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Http\Requests\Progres\ProgresCreateRequest;
use App\Http\Requests\Progres\ProgresUpdateRequest;
use Storage;

class ProgresController extends Controller
{
	public function index(){
		$data['data'] = Project::where('is_progres', 1)->get();
		return view('admin.progres.index', $data);
	}

	public function create(){
		$data['project'] = Project::where('is_progres', 0)->get();
		return view('admin.progres.create', $data);
	}

	public function store(ProgresCreateRequest $request){
		Project::create($request->getValidRequest());
		return redirect()->back();
	}

	public function edit($id){
		$data['project'] = Project::where('is_progres', 0)->get();
		$data['data'] = Project::find($id);
		return view('admin.progres.edit', $data);
	}

	public function update(ProgresUpdateRequest $request, $id){
		$data = Project::find($id);
		if($request->has('image')){
			Storage::delete('/public/upload/project/'.$data->image);
		}
		$data->update($request->getValidRequest());
		return redirect()->back();
	}

	public function destroy(Request $request, $id){
		$data = Project::find($id);
		Storage::delete('/public/upload/project/'.$data->image);
		$data = Project::destroy($id);
		return redirect()->back();
	}
}
