<?php
namespace Services;
use App\Galery;
use App\Fasilitas;
use Storage;
use Intervention\Image\Facades\Image;

class GaleryService
{
	public function __construct(){
        $this->asset = Storage::url('upload/galery/');
        $this->uploadPath = storage_path("app/public/upload/galery/");
	}

	public function store($req)
	{
        $this->checkDir(false);
        $uploadPath = $this->uploadPath;
        $name = "galery-".str_replace('.', '', microtime(true)).'.'.$req['image']->getClientOriginalExtension();
        if($req['fasilitas_id'] !== 0){
			$f = new Fasilitas;
            $image = Image::make($req['image'])->resize(NULL, $f->h, function ($constraint) {$constraint->aspectRatio();})->fit($f->w, $f->h);
            $image->save($this->uploadPath.$name);
        }else{
            $path = Storage::putFileAs(
	            'public/upload/galery/',
	            $req->file('image'),
	            $name
	        );
        }
		$data = Galery::create([
			'project_id' => $req['project_id'],
			'detail_id' => $req['detail_id'],
			'fasilitas_id' => $req['fasilitas_id'],
			'name' => $req['name'],
			'image' => $name,
			'keterangan' => $req['keterangan'],
		]);
		return $data;
	}

	public function update($req, $id)
	{
        $imagename = "galery.png";
		$data = Galery::find($id);
        if ($req['image']){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
        	$name = "galery-".str_replace('.', '', microtime(true)).'.'.$req['image']->getClientOriginalExtension();
	        if($req['fasilitas_id'] != 0){
				$f = new Fasilitas;
	            $image = Image::make($req['image'])->resize(NULL, $f->h, function ($constraint) {$constraint->aspectRatio();})->fit($f->w, $f->h);
	            $image->save($this->uploadPath.$name);
	        }else{
	            $path = Storage::putFileAs(
		            'public/upload/galery/',
		            $req['image'],
		            $name
		        );
	        }
			Storage::delete('/public/upload/galery/'.$data->image);
			$data->update([
				'project_id' => $req['project_id'],
				'detail_id' => $req['detail_id'],
				'fasilitas_id' => $req['fasilitas_id'],
				'name' => $req['name'],
				'image' => $name,
				'keterangan' => $req['keterangan'],
			]);
        }else{
			Storage::delete('/public/upload/galery/'.$data->image);
			$data->update([
				'project_id' => $req['project_id'],
				'detail_id' => $req['detail_id'],
				'fasilitas_id' => $req['fasilitas_id'],
				'name' => $req['name'],
				'keterangan' => $req['keterangan'],
			]);
        }
		return $data;
	}

	public function destroy($id)
	{
		$data = Galery::find($id);
		Storage::delete('/public/upload/galery/'.$data->image);
		$data = Galery::destroy($id);
		return $data;
	}


    /**
    * check directory and create
    **/
    private function checkDir($thumb = false){
        if(!Storage::exists('/public/upload/galery/')) {
            Storage::makeDirectory('/public/upload/galery/', 0775, true);
        }
        if($thumb){
            if(!Storage::exists('/public/upload/galery/thumb/')) {
                Storage::makeDirectory('/public/upload/galery/thumb/', 0775, true);
            }
        }
    }
}