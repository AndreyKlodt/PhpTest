<?php
namespace liw\app;
class Cows extends Animal{
    public function __construct($animalName, $animalProduct)
    {
        parent::__construct($animalName, $animalProduct);
    }

    public static $collectedMilk = 0;
    public function createAnimal()
    {
        $milk = rand(8,12);
        $this->productAmmount = $milk;
        parent::createAnimal();
        self::$collectedMilk += $milk;
    }
}
