<?php

class BankAccount
{
	private $balance;

	public function __construct($amount)
	{
		$this->balance = $amount;
	}

	public function getBalance()
	{
		return $this->balance;
	}

	public function deposit($amount)
	{
		if ($amount > 0) {
			$this->balance += $amount;
		}
		return $this;
	}

	public function withdraw($amount)
	{
		if ($amount > 0 && $amount <= $this->balance) {
			$this->balance -= $amount;
			return true;
		}
		return false;
	}
}

class CheckingAccount extends BankAccount
{
	private $minBalance;

	public function __construct($amount, $minBalance)
	{
		if ($amount > 0 && $amount >= $minBalance) {
			parent::__construct($amount);
			$this->minBalance = $minBalance;
		} else {
			throw new InvalidArgumentException('amount must be more than zero and higher than the minimum balance');
		}
	}

	public function withdraw($amount)
	{
		$canWithdraw = $amount > 0 &&
					   $this->getBalance() - $amount > $this->minBalance;

		if ($canWithdraw) {
			parent::withdraw($amount);

			return true;
		}

		return false;
	}
}

// Method overriding allows a child class to define a method that overrides (or replaces) the method already provided by its parent class.
// Use parent:: to call the overridden method in the overriding method