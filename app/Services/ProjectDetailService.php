<?php
namespace Services;
use App\ProjectDetail;
use Storage;
// use Intervention\Image\Facades\Image;

class ProjectDetailService
{
	public function __construct(){
        $this->asset = Storage::url('upload/project_detail/');
        $this->uploadPath = storage_path("app/public/upload/project_detail/");
	}
	
	public function store($req)
	{
        $imagename = "project_detail.png";
        if ($req->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "dsm-prjdtl-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/project_detail/',
	            $req->file('image'),
	            $imagename
	        );
            // $image = Image::make($image)->resize(NULL, 400, function ($constraint) {$constraint->aspectRatio();});//->fit(400, 200);
            // $image->save($uploadPath.'/'.$imagename);
        }

		$data = ProjectDetail::create([
			'project_id' => $req['project_id'],
			'title' => $req['title'],
			'subtitle' => $req['subtitle'],
			'image' => $imagename,
			'keterangan' => $req['keterangan'],
		]);
		return $data;
	}

	public function update($req, $id)
	{
        $imagename = "project_detail.png";
        if ($req->has('image')){
            $this->checkDir(false);
            $uploadPath = $this->uploadPath;
            $imagename = "dsm-prjdtl-".str_replace('.', '', microtime(true)).".jpg";
            $path = Storage::putFileAs(
	            'public/upload/project_detail/',
	            $req->file('image'),
	            $imagename
	        );
            // $image = Image::make($image)->resize(NULL, 400, function ($constraint) {$constraint->aspectRatio();});//->fit(400, 200);
            // $image->save($uploadPath.'/'.$imagename);
			$data = ProjectDetail::find($id);
			Storage::delete('/public/upload/project_detail/'.$req->image);
			$data->update([
				'project_id' => $req['project_id'],
				'title' => $req['title'],
				'subtitle' => $req['subtitle'],
				'image' => $imagename,
				'keterangan' => $req['keterangan'],
			]);
        }else{
			$data = ProjectDetail::find($id);
			$data->update([
				'project_id' => $req['project_id'],
				'title' => $req['title'],
				'subtitle' => $req['subtitle'],
				'keterangan' => $req['keterangan'],
			]);
        }
		return $data;
	}

	public function destroy($id)
	{
		$data = ProjectDetail::find($id);
		Storage::delete('/public/upload/project_detail/'.$req->image);
		$data = ProjectDetail::destroy($id);
		return $data;
	}


    /**
    * check directory and create
    **/
    private function checkDir($thumb = false){
        if(!Storage::exists('/public/upload/project_detail/')) {
            Storage::makeDirectory('/public/upload/project_detail/', 0775, true);
        }
        if($thumb){
            if(!Storage::exists('/public/upload/project_detail/thumb/')) {
                Storage::makeDirectory('/public/upload/project_detail/thumb/', 0775, true);
            }
        }
    }
}