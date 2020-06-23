<?php
namespace Services;
use App\About;
use Storage;

class AboutService
{
	public function __construct(){
        $this->asset = Storage::url('upload/about/');
        $this->uploadPath = storage_path("app/public/upload/about/");
	}

	public function store($data)
	{
        $imagename = "about.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "about-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/about/',
	            $data->file('image'),
	            $imagename
	        );
        }
		$data = About::create([
			'name' => $data['name'],
			'title' => $data['title'],
			'image' => $imagename,
			'fb' => $data['fb'],
			'twitter' => $data['twitter'],
			'in' => $data['in'],
			// 'status' => $data['status']
		]);
		return $data;
	}

	public function update($data, $id)
	{
        $imagename = "about.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "about-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/project/',
	            $data->file('image'),
	            $imagename
	        );
        }
		$data = About::find($id);
		Storage::delete('/public/upload/about/'.$data->image);
		$data->update([
			'name' => $data['name'],
			'title' => $data['title'],
			'image' => $imagename,
			'fb' => $data['fb'],
			'twitter' => $data['twitter'],
			'in' => $data['in'],
			'status' => $data['status']
		]);
		return $data;
	}

	public function destroy($id)
	{
		$data = About::find($id);
		Storage::delete('/public/upload/about/'.$data->image);
		$data = About::destroy($id);
		return $data;
	}


    /**
    * check directory and create
    **/
    private function checkDir($thumb = false){
        if(!Storage::exists('/public/upload/about/')) {
            Storage::makeDirectory('/public/upload/about/', 0775, true);
        }
        if($thumb){
            if(!Storage::exists('/public/upload/about/thumb/')) {
                Storage::makeDirectory('/public/upload/about/thumb/', 0775, true);
            }
        }
    }
}