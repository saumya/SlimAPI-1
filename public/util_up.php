<?php

namespace App\Util;

class UtilUp
{
    // property declaration
    public $var = 'a default value';
    public $name = 'UtilUp';

    // method declaration
    public function displayVar() {
        //echo $this->var;
        return $this->var;
    }
    public function className() {
    	return $this->name;
    }
}

?>