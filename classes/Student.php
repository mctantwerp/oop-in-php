<?php

// Via het definiëren van een namespace kan je voorkomen dat classes met dezelfde naam gaan "clashen"
namespace KdG;

use KdG\StaticCache;

Class Student
{
    private string $name;
    private string $email;

    public function setName($name)
    {
        $this->name = $name;
    }

    // Door via methods te gaan kunnen we onze input gaan valideren of bewerken
    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }
        $this->email = $email;
    }

    public function printDetails():string
    {
        if(empty($this->name))
        {
            $this->name = StaticCache::get('name');
        }
        return "{$this->name} ($this->email)";
    }
}
