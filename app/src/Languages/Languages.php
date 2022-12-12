<?php 

namespace Languages;

use Framework\Config\Config;

class Languages{ 

    public array $language = [];

    public function __construct($language_key)
    {
        $this->language = Config::get($language_key);
    }

    public function getLanguage(){
        return $this->language;
    }

}
