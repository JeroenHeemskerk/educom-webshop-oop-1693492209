<?php
class crudfactory{
    private $crud;
    public function __construct(crud $crud) {
        $this -> crud = $crud;
    }
    public function getcrud($name){
        switch ($name){
            case 'usercrud':
                return $this -> model = new usercrud($this -> crud);
                break;
        }
    }
}