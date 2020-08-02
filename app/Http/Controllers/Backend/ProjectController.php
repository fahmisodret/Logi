<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Http\Requests\Project\ProjectCreateRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use Storage;

class ProjectController extends Controller
{
	public function index(){
		$data['data'] = Project::where('is_progres', 0)->get();
		return view('admin.project.index', $data);
	}

	public function create(){
		return view('admin.project.create');
	}

	public function store(ProjectCreateRequest $request){
		Project::create($request->getValidRequest());
		return redirect()->back();
	}

	public function edit($id){
		$data['data'] = Project::find($id);
		return view('admin.project.edit', $data);
	}

	public function update(ProjectUpdateRequest $request, $id){
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
