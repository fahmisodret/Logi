<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Services\ProjectService;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
	public function index(){
		$data['data'] = Project::all();
		return view('admin.project.index', $data);
	}

	public function create(){
		return view('admin.project.create');
	}

	public function store(ProjectRequest $request, ProjectService $projectService){
		$projectService->store($request);
		return redirect()->back();
	}

	public function edit($id){
		$data['data'] = Project::find($id);
		return view('admin.project.edit', $data);
	}

	public function update(ProjectRequest $request, ProjectService $projectService, $id){
		$data = $projectService->update($request, $id);
		return redirect()->back();
	}

	public function destroy(Request $request, ProjectService $projectService, $id){
		$data = $projectService->destroy($id);
		return redirect()->back();
	}
}
