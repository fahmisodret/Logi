<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Services\ConfigService;

class ConfigController extends Controller
{
	public function index(){
		$data['data'] = Config::all();
		return view('admin.config.index', $data);
	}

	public function edit($id){
		$data['data'] = Config::find($id);
		return view('admin.config.edit', $data);
	}

	public function update(Request $request, ConfigService $configService, $id){
		$configService->update($request->all(), $id);
		return redirect()->back();
	}
}
