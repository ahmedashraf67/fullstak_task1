<?php

class Student {
    public $name;
    public $email;
    public $age;
    private $isActive = false;

    public function __construct($name, $email, $age) {
        $this->name  = $name;
        $this->email = $email;
        $this->age   = $age;
    }

    public function activate() {
        $this->isActive = true;
    }

    public function getStatus() {
        return $this->isActive ? "Active" : "Inactive";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $age   = $_POST['age'] ?? 0;


    $student = new Student($name, $email, $age);

    
    $student->activate();

    
    echo json_encode([
        'name'   => $student->name,
        'email'  => $student->email,
        'age'    => $student->age,
        'status' => $student->getStatus()
    ]);
} else {
    echo json_encode(['error' => 'Only POST requests allowed']);
}
?>
