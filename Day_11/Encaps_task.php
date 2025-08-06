<?php

class BankAccount {
    private $balance;

    
    public function __construct($initialBalance = 0) {
        $this->balance = $initialBalance;
    }

    
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited: $amount<br>";
        } else {
            echo "Invalid deposit amount<br>";
        }
    }

    
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Withdrawn: $amount<br>";
        } else { 
            echo "Invalid or insufficient balance<br>";
        }
    }

     
    public function getBalance() {
        echo "Current Balance: " . $this->balance . "<br>";
    }
}


$account = new BankAccount(1000);  
$account->deposit(500);            
$account->withdraw(300);           
$account->getBalance();            

?>
