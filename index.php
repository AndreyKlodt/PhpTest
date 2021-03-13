<?php


require __DIR__ . "/vendor/autoload.php";

// Создаем кур
for($i=1; $i<=20;++$i){
    $chickens = new \liw\app\Chickens("Курица","Яйца");
    $chickens->createAnimal();
}
// Создаем коров
for($i=1; $i<=10;++$i){
    $cows = new \liw\app\Cows("Корова","Молоко");
    $cows->createAnimal();
}
echo"Всего яиц {$chickens::$collectedEggs}шт.";
echo"</br>";
echo"Всего молока {$cows::$collectedMilk}л.";

