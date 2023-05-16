<?php

 class KASHYAP{
    public $name;
    public $hobby;


    function _constructor($name){
        $this->name=$name;
    }
    function destruct_(){
        echo "My name is {$this->name}.";
    }
 }
 $intro = new  KASHYAP("From Rajkot");
?>