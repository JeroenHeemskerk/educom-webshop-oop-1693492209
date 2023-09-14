<?php
include_once 'models/page-model-class';
include_once 'models/user-model-class';
include_once 'models/shop-model-class';
class modelfactory{
    public function __construct($crudfactory) {
        $this -> crudfactory = $crudfactory;
    }
    public function getmodel($name){
        switch ($name){
            case 'page':
                return $this -> model = new Pagemodel(NULL);
                break;
            case 'user':
                return $this -> model = new UserModel(NULL);
                break;
            case 'shop':
                return $this -> model = new ShopModel(NULL);
                break;
        }
    }
}