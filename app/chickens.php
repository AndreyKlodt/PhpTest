<?php
namespace liw\app;
class Chickens extends Animal{
    public function __construct($animalName, $animalProduct)
    {
        parent::__construct($animalName, $animalProduct);
    }

    public static $collectedEggs = 0;
    public function createAnimal()
    {
        $egg = rand(0,2);
        $this->productAmmount = $egg;
        parent::createAnimal();
        self::$collectedEggs += $egg;
    }

}
