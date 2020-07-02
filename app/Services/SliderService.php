<?php
namespace Services;
use App\Slider;
use Storage;
use Intervention\Image\Facades\Image;

class SliderService
{
	public function __construct(){
        $this->asset = Storage::url('upload/slider/');
        $this->uploadPath = storage_path("app/public/upload/slider/");
	}

	public function store($req)
	{
        $image = "slider.png";
        if ($req->has('image')){
			$image = $this->upload($req['image']);
        }
		$data = Slider::create([
			'name' => $req['name'],
			'image' => $image,
		]);
		return $data;
	}

	public function update($req, $id)
	{
        if (isset($req['image'])){
	        $this->checkDir(true);
			$data = Slider::find($id);
			$image = $this->upload($data->image, $req['image']);
			$data = $data->update([
				'name' => $data['name'],
				'image' => $image,
			]);
        }else{
			$data = Slider::find($id)->update([
				'name' => $data['name'],
			]);
		}
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
    private function upload($old = false, $new = false){
    	if($old){
			Storage::delete('/public/upload/slider/'.$old);
			Storage::delete('/public/upload/slider/thumb/'.$old);
    	}
        $imagename = "slider-".str_replace('.', '', microtime(true)).'.'.$new->getClientOriginalExtension();
        $thumb = Image::make($new)->resize(NULL, 400, function ($constraint) {$constraint->aspectRatio();})->fit(400, 200)->encode('jpg', 75);
        $thumb->save($this->uploadPath.'/thumb/'.$imagename);
        $image = Image::make($new)->resize(1349, NULL, function ($constraint) {$constraint->aspectRatio();})->fit(1349, 500);
        $image->save($this->uploadPath.'/'.$imagename);
        return $imagename;
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