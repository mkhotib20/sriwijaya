<?php
namespace frontend\components;

class Icons 
{

    public static $icons = [
        'man' => 'man.svg',
        'piano' => 'piano.svg',
        'medal' => 'medal.svg',
        'guitar' => 'guitar.svg',
    ];
    public static $url = 'http://sriwijaya.io/';
    public function getAll()
    {
        foreach (self::$icons as $key => $value) {
            $data[$key] = ucfirst($key);
        }
        return $data;
    }
    public function get($type)
    {
        $icon = isset(self::$icons[$type]) ? file_get_contents(self::$url."svg/".self::$icons[$type]) : null;
        return $icon;
    }
}
