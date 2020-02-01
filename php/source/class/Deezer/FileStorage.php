<?php

namespace ElBiniou\Deezer;

class FileStorage
{

    public function __construct($path = null)
    {
        if($path === null) {
            if(defined('STORAGE_PATH')) {
                $path = STORAGE_PATH;
            }
            else {
                throw new Exception('You must provide a path');
            }
        }

        $this->path = $path;
    }

    public function set($key, $data) {
        $key = $this->slugiffy($key);
        file_put_contents($this->path.'/'.$key.'.json', $data);
    }

    public function get($key)
    {
        $key = $this->slugiffy($key);
        if(is_file($this->path.'/'.$key.'.json')) {
           file_get_contents($this->path.'/'.$key.'.json');
        }
        else {
            return false;
        }
    }

    public function slugiffy($string)
    {
        https://api.deezer.com/search?q=dire%20strait
        $string = str_replace('https://api.deezer.com', '', $string);
        $string = str_replace('-', '/', $string);
        $string = preg_replace('`[^0-9a-zA-Z\-/]`', '_', $string);
        return $string;
    }

}