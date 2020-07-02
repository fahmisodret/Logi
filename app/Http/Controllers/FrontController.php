<?php

namespace App\Http\Controllers;

use Services\TestService;
use Illuminate\Http\Request;
use App\About;
use App\Project;
use App\Galery;
use App\ProjectDetail;
use App\Fasilitas;

class FrontController extends Controller
{
	public function index(){
		$data['project'] = Project::all();
		return view('front.pages.index', $data);
	}

	public function about(){
		$data['data'] = About::all();
		return view('front.pages.about', $data);
	}

	public function project(){
		$data['data'] = Project::all();
		return view('front.pages.project', $data);
	}

	public function galery(){
		$data['data'] = Galery::all();
		return view('front.pages.galery', $data);
	}

	public function contact(){
		return view('front.pages.contact');
	}

	public function projectDetail($slug){
		$data['data'] = Project::where('slug', $slug)->with('detail')->first();
		return view('front.pages.project_detail', $data);
	}

	// page image
	public function image($slug, $type, $id){
		// switch ($type) {
		// 	case 'fasilitas':
		// 		$data['data'] = Project::where('slug', $slug)->with('project')->first();
		// 		$data['type'] = $type;
		// 		break;
		// 	case 'detail':
		// 		$data['data'] = Project::where('slug', $slug)->with('detail')->first();
		// 		$data['type'] = $type;
		// 		break;
		// 	case 'project':
		// 		$data['data'] = Project::where('slug', $slug)->with('detail')->first();
		// 		$data['type'] = $type;
		// 		break;
			
		// 	default:
		// 		# code...
		// 		break;
		// }
		$data['type'] = $type;
		switch ($type) {
			case 'fasilitas':
				$data['data'] = Project::where('slug', $slug)->first();
				$data['fasilitas'] = Fasilitas::find($id);
				$data['galery'] = Galery::whereIn('fasilitas_id', [$id])->get()->toArray();
				return view('front.pages.image_fasilitas', $data);
			break;
			case 'detail':
				$data['data'] = Project::where('slug', $slug)->first();
				$data['detail'] = ProjectDetail::find($id);
				$data['galery'] = Galery::whereIn('detail_id', [$id])->get()->toArray();
				return view('front.pages.image_detail', $data);
			break;
			case 'project':
				$produk = Project::where('slug', $slug)->first();
				$p = Galery::where('project_id', $produk->id)->get()->toArray();
				$d_id = $produk->detail()->select('id')->get()->toArray();
				$d = Galery::whereIn('detail_id', $d_id)->get()->toArray();
				$f_id = $produk->fasilitas()->select('id')->get()->toArray();
				$f = Galery::whereIn('fasilitas_id', $f_id)->get()->toArray();
				$data['data'] = $produk;
				$data['galery'] = array_merge($p, $f, $d);
				return view('front.pages.image_project', $data);
			break;
		}
	}
}
