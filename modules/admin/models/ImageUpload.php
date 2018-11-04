<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;

class ImageUpload extends Model
{
  public $image;


  public function uploadFile($file, $currentImage)
    {
        $this->image = $file;

       if($this->validate())
       {
           $this->deleteCurrentImage($currentImage);
           return $this->saveImage();
       }
    }
    public function getFolder()
    {
        return Yii::getAlias('@web') . 'upload/';
    }
    public function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }
    public function deleteCurrentImage($currentImage)
    {
        if($this->fileExists($currentImage))
        {
            unlink($this->getFolder() . $currentImage);
        }
    }
    public function fileExists($currentImage)
    {
        if(!empty($currentImage) && $currentImage != null)
        {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }

    public function getImage()
    {
      if(isset($this->image))
        return ($this->image) ? '/upload/'. $this->image : '/upload/no-image.png';
    }

}
