<?php
namespace liw\app;
class Animal{
    public function __construct($animalName,$animalProduct)
    {
        $this->animalName=$animalName;
        $this->animalProduct = $animalProduct;
        $this->productAmmount=1; // Базовое кол-во продукции
    }
    public static $id =0;
    function createAnimal(){
        $barn[]= ["$this->animalName"=>[$this->animalProduct=>$this->productAmmount], ++self::$id];
    }
}