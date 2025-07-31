<?php

class Vehicle {
    public $model;
    public $maker;

    public function __construct($model, $maker) {
        $this->model = $model;
        $this->maker = $maker;
    }

    public function info() {
        echo "Model: " . $this->model . "<br>";
        echo "Maker: " . $this->maker . "<br>";
    }
}


class Car extends Vehicle {
    public $fuelType;

    public function __construct($model, $maker, $fuelType) {
        
        parent::__construct($model, $maker);
        $this->fuelType = $fuelType;
    }

   
    public function info() {
        parent::info(); 
        echo "Fuel Type: " . $this->fuelType . "<br>";
    }
}


$myCar = new Car("Corolla", "Toyota", "Gasoline");
$myCar->info();

?>
