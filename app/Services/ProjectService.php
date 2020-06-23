<?php
namespace Services;
use App\Project;
use Storage;
// use Intervention\Image\Facades\Image;

class ProjectService
{
	public function __construct(){
        $this->asset = Storage::url('upload/project/');
        $this->uploadPath = storage_path("app/public/upload/project/");
	}
	
	public function store($data)
	{
        $imagename = "project.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "prj-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/project/',
	            $data->file('image'),
	            $imagename
	        );
            // $image = Image::make($image)->resize(NULL, 400, function ($constraint) {$constraint->aspectRatio();});//->fit(400, 200);
            // $image->save($uploadPath.'/'.$imagename);
        }

		$data = Project::create([
			'title' => $data['title'],
			'subtitle' => $data['subtitle'],
			'image' => $imagename,
			'keterangan' => $data['keterangan'],
		]);
		return $data;
	}

	public function update($data, $id)
	{
        $imagename = "project.png";
        if ($data->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "prj-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/project/',
	            $data->file('image'),
	            $imagename
	        );
            // $image = Image::make($image)->resize(NULL, 400, function ($constraint) {$constraint->aspectRatio();});//->fit(400, 200);
            // $image->save($uploadPath.'/'.$imagename);
        }
		$data = Project::find($id);
		Storage::delete('/public/upload/project/'.$data->image);
		$data->update([
			'title' => $data['title'],
			'subtitle' => $data['subtitle'],
			'image' => $imagename,
			'keterangan' => $data['keterangan'],
		]);
		return $data;
	}

	public function destroy($id)
	{
		$data = Project::find($id);
		Storage::delete('/public/upload/project/'.$data->image);
		$data = Project::destroy($id);
		return $data;
	}


    /**
    * check directory and create
    **/
    private function checkDir($thumb = false){
        if(!Storage::exists('/public/upload/project/')) {
            Storage::makeDirectory('/public/upload/project/', 0775, true);
        }
        if($thumb){
            if(!Storage::exists('/public/upload/project/thumb/')) {
                Storage::makeDirectory('/public/upload/project/thumb/', 0775, true);
            }
        }
    }
}