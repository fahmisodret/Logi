<?php
namespace Services;
use App\Config;
use Storage;
use Intervention\Image\Facades\Image;
class ConfigService
{
	public function __construct(){
        $this->asset = Storage::url('upload/config/');
        $this->uploadPath = storage_path("app/public/upload/config/");
	}
	
	public function update($req, $id)
	{
        if (isset($req['image'])){
	        $this->checkDir(true);
			$cfg = Config::where('name', $req['name'])->first();
			Storage::delete('/public/upload/config/'.$cfg->keterangan);
			$image = $this->upload($req['image']);
			$data = Config::find($id)->update([
				'keterangan' => $image
			]);
        }else{
			$data = Config::find($id)->update([
				'keterangan' => $req['keterangan']
			]);
        }
		return $data;
	}

	public function findByName($name)
	{
		$data = Config::whereName($name)->first();
		return $data;
	}


    /**
    * check directory and create
    **/
    private function upload($image = false){
        $imagename = "cfg-".str_replace('.', '', microtime(true)).'.'.$image->getClientOriginalExtension();
        $thumb = Image::make($image)->resize(NULL, 200, function ($constraint) {$constraint->aspectRatio();})->fit(200, 200);
        $thumb->save($this->uploadPath.'/thumb/'.$imagename);
        $image = Image::make($image)->resize(NULL, 700, function ($constraint) {$constraint->aspectRatio();})->fit(700, 700);
        $image->save($this->uploadPath.'/'.$imagename);
        return $imagename;
    }


    /**
    * check directory and create
    **/
    private function checkDir($thumb = false){
        if(!Storage::exists('/public/upload/config/')) {
            Storage::makeDirectory('/public/upload/config/', 0775, true);
        }
        if($thumb){
            if(!Storage::exists('/public/upload/config/thumb/')) {
                Storage::makeDirectory('/public/upload/config/thumb/', 0775, true);
            }
        }
    }
}