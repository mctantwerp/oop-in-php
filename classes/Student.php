<?php

// Via het definiëren van een namespace kan je voorkomen dat classes met dezelfde naam gaan "clashen"
namespace KdG;

Class Student
{
    private string $name;
    private string $email;

    public function setName(string $name): string
    {
        $this->name = $name;
    }

    // Door via methods te gaan kunnen we onze input gaan valideren of bewerken
    public function setEmail(string $email): string
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }
        $this->email = $email;
    }

    public function printDetails():string
    {
        return "{$this->name} ($this->email)";
    }
}
