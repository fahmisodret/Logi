<?php
 
namespace App\Traits;
use Intervention\Image\Facades\Image;

trait UploadTrait
{
    public function setImageAttribute($file)
    {
        if($file){
            $this->checkDir();
            $name = str_replace('.', '', microtime(true)).'.'.$file->getClientOriginalExtension();
            if($this->resize){
                $image = Image::make($file)->resize(NULL, $this->h, function ($constraint) {$constraint->aspectRatio();})->fit($this->w, $this->h);
            }else{
                $image = Image::make($file);
            }
            $image->save($this->imagePath.$name);
            $this->attributes['image'] = $name;
        }
    }

    /**
    * check directory and create
    **/
    private function checkDir(){
        if(!file_exists($this->imagePath)) {
            mkdir($this->imagePath, 0775, true);
        }
    }
}