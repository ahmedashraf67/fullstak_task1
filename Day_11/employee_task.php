<?php

class Employee {
    public $name;
    protected $salary;
    private $bonus;

    
    public function setData($name, $salary, $bonus) {
        $this->name = $name;
        $this->salary = $salary;
        $this->bonus = $bonus;
    }

    
    public function printData() {
        echo "Name: " . $this->name . "<br>";
        echo "Salary: " . $this->salary . "<br>";
        echo "Bonus: " . $this->bonus . "<br>";
    }
}


$emp = new Employee();
$emp->setData("Ahmed", 7000, 1500);
$emp->printData();

?>
