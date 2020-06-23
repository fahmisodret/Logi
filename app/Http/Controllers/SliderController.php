<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Services\SliderService;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
	public function index(){
		$data['data'] = Slider::all();
		return view('admin.slider.index', $data);
	}

	public function create(){
		return view('admin.slider.create');
	}

	public function store(SliderRequest $request, SliderService $sliderService){
		$sliderService->store($request);
		return redirect()->back();
	}

	public function edit($id){
		$data['data'] = Slider::find($id);
		return view('admin.slider.edit', $data);
	}

	public function update(SliderRequest $request, SliderService $sliderService, $id){
		$data = $sliderService->update($request, $id);
		return redirect()->back();
	}

	public function destroy(Request $request, SliderService $sliderService, $id){
		$data = $sliderService->destroy($id);
		return redirect()->back();
	}
}
