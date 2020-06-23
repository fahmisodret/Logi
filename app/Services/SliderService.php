<?php
namespace Services;
use App\Slider;
use Storage;

class SliderService
{
	public function __construct(){
        $this->asset = Storage::url('upload/slider/');
        $this->uploadPath = storage_path("app/public/upload/slider/");
	}

	public function store($data)
	{
        $imagename = "slider.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "slider-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/slider/',
	            $data->file('image'),
	            $imagename
	        );
        }
		$data = Slider::create([
			'name' => $data['name'],
			'image' => $imagename,
		]);
		return $data;
	}

	public function update($data, $id)
	{
        $imagename = "slider.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "slider-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/slider/',
	            $data->file('image'),
	            $imagename
	        );
        }
		$data = Slider::find($id);
		Storage::delete('/public/upload/slider/'.$data->image);
		$data->update([
			'name' => $data['name'],
			'image' => $imagename,
		]);
		return $data;
	}

	public function destroy($id)
	{
		$data = Slider::find($id);
		Storage::delete('/public/upload/slider/'.$data->image);
		$data = Slider::destroy($id);
		return $data;
	}


    /**
    * check directory and create
    **/
    private function checkDir($thumb = false){
        if(!Storage::exists('/public/upload/slider/')) {
            Storage::makeDirectory('/public/upload/slider/', 0775, true);
        }
        if($thumb){
            if(!Storage::exists('/public/upload/slider/thumb/')) {
                Storage::makeDirectory('/public/upload/slider/thumb/', 0775, true);
            }
        }
    }
}