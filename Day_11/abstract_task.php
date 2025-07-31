<?php


abstract class Employee {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    
    abstract public function calculateSalary();
}


class HourlyEmployee extends Employee {
    private $hoursWorked;
    private $hourlyRate;

    public function __construct($name, $hoursWorked, $hourlyRate) {
        parent::__construct($name);
        $this->hoursWorked = $hoursWorked;
        $this->hourlyRate = $hourlyRate;
    }

   
    public function calculateSalary() {
        $salary = $this->hoursWorked * $this->hourlyRate;
        echo "Employee: " . $this->name . "<br>";
        echo "Salary: $" . $salary . "<br>";
    }
}


$employee = new HourlyEmployee("Ahmed", 40, 50);
$employee->calculateSalary();

?>
