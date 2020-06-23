<?php
namespace Services;
use App\Galery;
use Storage;

class GaleryService
{
	public function __construct(){
        $this->asset = Storage::url('upload/galery/');
        $this->uploadPath = storage_path("app/public/upload/galery/");
	}

	public function store($data)
	{
        $imagename = "galery.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "galery-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/galery/',
	            $data->file('image'),
	            $imagename
	        );
        }
		$data = Galery::create([
			'name' => $data['name'],
			'image' => $imagename,
		]);
		return $data;
	}

	public function update($data, $id)
	{
        $imagename = "galery.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "galery-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/project/',
	            $data->file('image'),
	            $imagename
	        );
        }
		$data = Galery::find($id);
		Storage::delete('/public/upload/galery/'.$data->image);
		$data->update([
			'name' => $data['name'],
			'image' => $imagename,
		]);
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