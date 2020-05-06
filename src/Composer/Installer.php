<?php


namespace Jou\Modules\Composer;


class Installer extends Run
{
    /**
     * @var
     */
    protected $composerJson;

    /**
     * Installer constructor.
     * @param string $composerJson
     */
    public function __construct(string $composerJson = null)
    {

    }

    /**
     * set composerJson
     * @param string $composerJson
     * @return $this
     */
    public function setComposerJson(string $composerJson){
        $this->composerJson = $composerJson;
        return $this;
    }

}
