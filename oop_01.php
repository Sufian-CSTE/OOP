<?php

// A class name should be in the upper camel case where each word is capitalized. 
// For example, BankAccount, Customer, Transaction, and DebitNote.

class BankAccount
{
    // properties 
    public $accountNumber;
    public $balance;
    
    // methods 
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Account balance is {$this->balance}\n";
        }
    }

    public function withdraw($amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;

            echo "The account Balance after Withdraw is {$this->balance}\n";
            return false;
        }

        echo "The account Balance is less than Request Amount";
        return true;
    }
}

$account = new BankAccount();

$account->accountNumber = 1;
$account->balance = 100;

$account->deposit(150);
$account->withdraw(50);


// Objects have states and behaviors.

// A class is a blueprint for creating objects.

// Properties represent the object’s state, and methods represent the object’s behavior. Properties and methods have visibility.

// Use the new keyword to create an object from a class.

// The $this variable references the current object of the class.