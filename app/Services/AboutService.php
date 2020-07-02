<?php
namespace Services;
use App\About;
use Storage;
use Intervention\Image\Facades\Image;

class AboutService
{
	public function __construct(){
        $this->asset = Storage::url('upload/about/');
        $this->uploadPath = storage_path("app/public/upload/about/");
	}

	public function store($req)
	{
        $imagename = "about.png";
        if ($req->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "about-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/about/',
	            $req->file('image'),
	            $imagename
	        );
        }
		$data = About::create([
			'name' => $req['name'],
			'title' => $req['title'],
			'image' => $imagename,
			'fb' => $req['fb'],
			'twitter' => $req['twitter'],
			'in' => $req['in'],
			// 'status' => $req['status']
		]);
		return $data;
	}

	public function update($req, $id)
	{
        if (isset($req['image'])){
	        $this->checkDir(true);
			$data = About::find($id);
			$image = $this->upload($data->image, $req['image']);
			$data = $data->update([
				'name' => $req['name'],
				'title' => $req['title'],
				'image' => $image,
				'fb' => $req['fb'],
				'twitter' => $req['twitter'],
				'in' => $req['in'],
				'status' => $req['status']
			]);
        }else{
			$data = About::find($id)->update([
				'name' => $req['name'],
				'title' => $req['title'],
				'fb' => $req['fb'],
				'twitter' => $req['twitter'],
				'in' => $req['in'],
				'status' => $req['status']
			]);
		}
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
    private function upload($old = false, $new = false){
    	if($old){
			Storage::delete('/public/upload/about/'.$old);
    	}
        $imagename = "about-".str_replace('.', '', microtime(true)).'.'.$new->getClientOriginalExtension();
        $image = Image::make($new)->resize(NULL, 200, function ($constraint) {$constraint->aspectRatio();});
        // ->fit(200, 200);
        $image->save($this->uploadPath.'/'.$imagename);
        return $imagename;
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