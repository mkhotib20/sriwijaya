<?php
namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * FIleUpload is the model behind the upload form.
 */
class FIleUpload extends Model
{
   /**
     * @var UploadedFile
     */
    public $imageFile;
    public $newName;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    protected function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
     
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
    
    public function upload($title, $type)
    {
        $title = $this->clean($title);
        $this->newName = 'img-'.time().'-'.str_replace(' ', '-',strtolower($title));
        try {
            if ($this->validate()) {
                $this->imageFile->saveAs('storage/'.$type.'/' . $this->newName . '.' . $this->imageFile->extension);
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function getImageName()
    {
        return $this->newName . '.' . $this->imageFile->extension;
    }
}