<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Illuminate\Support\Facades\Artisan;
use App\Menu;
use App\User;

class MenuController extends Controller
{
	public function index(){
		$menu = Menu::all();
		$data = [];
		foreach ($menu as $items) {
			$item = &$child[$items->id];
			$item['name'] = $items->name;
			$item['plural'] = $items->plural;
			if($items->parent_id == 0){
				$data['menu'][$items->id] = $item;
			}else{
        		$data['menu'][$items->parent_id]['child'][$items->id] = &$item;
			}
		}

    	$data['mainTitle'] = 'Menu';
    	$data['firstPage'] = 'Admin';
    	$data['secondPage'] = 'Menu';
		$data['menus'] = Menu::where('parent_id', 0)->get();

		return view('admin.menu.index', $data);
	}

	public function priv($id){
		// dd(User::find($id)->menus);
		$data['user_menu'] = User::find($id)->menus;
		$menu = Menu::all();
		$data = [];
		foreach ($menu as $items) {
			$item = &$child[$items->id];
			$item['name'] = $items->name;
			if($items->parent_id == 0){
				$data['menu'][$items->id] = $item;
			}else{
        		$data['menu'][$items->parent_id]['child'][$items->id] = &$item;
			}
		}

		return view('admin.menu.index', $data);
	}

	public function store(Request $request){
		$cr = Menu::create([
			'name'=>$request['name'],
			'plural'=>strtolower(Str::plural($request['name'])),
			'parent_id'=>$request['parent_id']
		]);
		// generate crud and view
		Artisan::call("generate:menu ".$request['name']);
		return redirect()->back();
	}

    public function destroy($id)
    {
        $status = 200;
        $message = 'Menu deleted!';
        $menu = Menu::find($id);
        if(count($menu->children)){
        	$menu->children()->delete();
        }

        $res = Menu::destroy($id);
        if(!$res){
            $status = 500;
            $message = 'Menu Not deleted!';
        }

        return redirect('admin/menu')
            ->with(['flash_status' => $status,'flash_message' => $message]);
    }

    public function update(Request $request, $id){
    	$menu = Menu::findOrFail($id);
    	$res = $menu->update(['name'=>$request->name]);
    	echo $res;
    }
}
