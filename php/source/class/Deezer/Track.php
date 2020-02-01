<?php

namespace ElBiniou\Deezer;

class Track
{

    protected $data;

    public function __construct()
    {
        $this->storage = new FileStorage();
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function save()
    {
        $this->storage->set('track-'.$this->getId(), json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

}