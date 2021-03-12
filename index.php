<?php


abstract class Farm{
}

//Добавлять животных в хлев
class createAnimal extends Farm{
    public function __construct($animal)
    {
       $this->animal=$animal;
    }

    public static $cowsId=0;
    public static $chickensId=0;
    public static $anotherAnim=0;
    public static $barn= [
        "cows"=>[],
        "chickens"=>[],
    ];

    public function formAnimal()
    {
        // Закидываю животных в объект и даю им уникальный id
        if($this->animal == "cow"){
            self::$barn["cows"] =["cow" => ++self::$cowsId];

        }elseif ($this->animal == "chicken"){
            self::$barn["chickens"] =["chicken" => ++self::$chickensId];
        }else{
            self::$barn[$this->animal] =[$this->animal => ++self::$anotherAnim];
        }
    }
}
//Создаю Коров
for($i = 1;$i<=10; $i++) {
    $animal = new createAnimal("cow");
    $animal->formAnimal();
}
//Создаю Куриц
for($i = 1;$i<=20; $i++) {
    $animal = new createAnimal("chicken");
    $animal->formAnimal();
}
//Здесь можно добавить другое животное:
//for($i = 1;$i<=20; $i++) {
//    $animal = new createAnimal("Zebra");
//    $animal->formAnimal();
//}

//Проверяю, сколько животных заселено в амбар
//print_r($animal::$barn);

//Собираю продукцию у всех животных, зарегистрированных в хлеву.
class collectProducts extends createAnimal {

        public function __construct($animal,$animalsId)
        {
            parent::__construct($animal);
            $this->animalsId=$animalsId;
        }

    function countProducts(){
        if($this->animal =="cow"){
            echo "Коров: $this->animalsId / Молоко: ";

            $collectedMilk = 0;
            for($i=0; $i<=$this->animalsId;$i++){
                $milk = rand(8,12); // Вычисляю кол-во молока, которое дает корова
                $collectedMilk += $milk; // Считаю все молоко
            }

            return $collectedMilk;
        } elseif ($this->animal =="chicken"){
            echo "Куриц: $this->animalsId / Яйца: ";
            $collectedEggs = 0;
            for($i=0; $i<=$this->animalsId;$i++){
                $egg = rand(0,1 ); // Вычисляю кол-во яиц, которое дает курица
                $collectedEggs += $egg; // Считаю все яйца
            }
            return $collectedEggs;
        }else{
            echo "$this->animal: $this->animalsId / Кол-во продукта: ";
            $collectedProduct = 0;
            for($i=0; $i<=$this->animalsId;$i++){
                $product = rand(4,10 ); // Вычисляю кол-во продукции, которое дает другое животное
                $collectedProduct += $product; // Считаю всю продукцию, которое дает другое животное
            }
            return $collectedProduct;
        }
    }
}
$animalProductCows = new collectProducts("cow","{$animal::$cowsId}");
$animalProductChickens = new collectProducts("chicken","{$animal::$chickensId}");
//другое животное
//$anotherProductAnimal = new collectProducts("zebra","{$animal::$anotherAnim}");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peppa`s Pig Farm</title>
    <style>
        body{
            background: url("peppa-pig-farm.jpg")no-repeat center ;
            text-align: center;
            height: 100vh;
        }
        h1{
            color: black;
        }
    </style>
</head>
<body>
    <h1><?php print_r($animalProductChickens->countProducts());?></h1>
    <h1><?php print_r($animalProductCows->countProducts()); ?></h1>
    <!-- <h1><?php //print_r($anotherProductAnimal->countProducts()); ?></h1> -->
</body>
</html>

