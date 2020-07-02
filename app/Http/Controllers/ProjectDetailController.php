<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectDetail;
use Services\ProjectDetailService;
use App\Http\Requests\ProjectDetailRequest;

class ProjectDetailController extends Controller
{
	public function index($id=0){
		if($id !== 0){
			$data['data'] = Project::with('detail')->find($id);
			return view('admin.project_detail.index', $data);
		}
		$data['data'] = ProjectDetail::all();
		return view('admin.project_detail.index', $data);
	}

	public function create(){
		$data['project'] = Project::all();
		return view('admin.project_detail.create', $data);
	}

	public function store(ProjectDetailRequest $request, ProjectDetailService $projectDetailService){
		$projectDetailService->store($request);
		return redirect()->back();
	}

	public function edit($id){
		$data['project'] = Project::all();
		$data['data'] = ProjectDetail::find($id);
		return view('admin.project_detail.edit', $data);
	}

	public function update(ProjectDetailRequest $request, ProjectDetailService $projectDetailService, $id){
		$data = $projectDetailService->update($request, $id);
		return redirect()->back();
	}

	public function destroy(Request $request, ProjectDetailService $projectDetailService, $id){
		$data = $projectDetailService->destroy($id);
		return redirect()->back();
	}
}
