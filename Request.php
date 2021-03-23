<?php

class Request 
{

    // public function __construct()
    // {
    //     foreach ($_REQUEST as $key => $item) {
    //         if ( is_array($item) ) {
    //             $this->$key = $this->setOptions($item);
    //         } else {
    //             $this->$key = $item;
    //         }
    //     }
    // }

    // private function setOptions($items)
    // {
    //     $tmp = new class {};

    //     foreach ($items as $key => $val) {

    //         if ( is_array($val) ) {
    //             $tmp->$key = $this->setOptions($val);
    //         }

    //         $tmp->$key = $val;
    //     }

    //     return $tmp;
    // }

    public function __get($name)
    {
        if ( isset($_REQUEST[$name]) ) {
            return $_REQUEST[$name];
        }
    }
}