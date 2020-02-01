<?php

namespace ElBiniou\Deezer;

class Client
{

    public function __construct()
    {
        $this->storage = new FileStorage();
    }


    public function query($url, $toArray = true)
    {
        if($json = $this->storage->get($url)) {
            $data = json_decode($json, $toArray);
            return $data;
        }
        else {
            $json = file_get_contents($url);
            $this->storage->set($url, $json);
            return json_decode($json, $toArray);
        }

        return false;
    }
}