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
    public function info(){
        $data = array(
                        'name' => 'UtilUp', 
                        'version' => '0.1.0',
                        'namespace' => 'App\Util'
                    );
        $result = json_encode($data);
        return $result;
    }
}

?>