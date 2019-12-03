<?php
namespace common\helper;
class ImageHelpers
{
    static $backend_url = 'http://admin.sriwijaya.io/storage/';
    public static function getImageUrl($img)
    {
        if ($img==null) {
            return self::$backend_url.'/default.png';
        }
        return self::$backend_url.$img;
    }
    public static function getRandomImage($url,$type)
    {
        return scandir($url.'/storage/'.$type.'/');
    }
}
