<?php


namespace Jou\Modules;


class Stub
{
    /**
     * path
     * @var string
     */
    private $path;

    /**
     * replaces
     * @var array
     */
    private $replaces;

    /**
     * The contructor.
     *
     * @param string $path
     * @param array  $replaces
     */
    public function __construct($path = null, array $replaces = [])
    {
        $this->path = $path;
        $this->replaces = $replaces;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public function setReplaces($replaces = []){
        $this->replaces = $replaces;
    }

    /**
     * get stub path
     * @return mixed
     */
    public function getPath(){
        return  __DIR__ . '/Commands/stubs' . $this->path;
    }

    /**
     * Get stub contents.
     *
     * @return mixed|string
     */
    public function getContents()
    {

        $contents = file_get_contents($this->getPath());

        foreach ($this->replaces as $search => $replace) {
            $contents = str_replace('$' . strtoupper($search) . '$', $replace, $contents);
        }

        return $contents;
    }

    public function getModuleJsonStubContent($module_name){
        return $this->getStubContents('module.json',['STUDLY_NAME'=>$module_name]);
    }

    /**
     * 获取指定stub内容
     * @param $stub
     * @param $replaces
     * @return mixed|string
     */
    public function getStubContents($stub,$replaces = []){
        $this->setPath('/'.$stub.'.stub');
        $this->setReplaces($replaces);
        return $this->getContents();
    }
}
