<?php

namespace Jou\Modules;
use Illuminate\Filesystem\Filesystem;

class Json
{
    /**
     * file path.
     * @var
     */
    private $path;

    /**
     * Filesystem instantiate.
     * @var Filesystem
     */
    private $filesystem;

    /**
     * Json constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;

        $this->filesystem = new Filesystem();
    }

    /**
     * get json attr
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key,$default = null){
        return Arr::get($this->toArray(),$key,$default);
    }

    /**
     * get file path
     * @return mixed
     */
    public function getPath(){
        return $this->path;
    }

    /**
     * get file content
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getContent(){
        return $this->filesystem->get($this->getPath());
    }

    /**
     * to array
     * @return mixed
     */
    public function toArray(){
        return json_decode($this->getContents(), true);
    }
}
