<?php

// Via het definiëren van een namespace kan je voorkomen dat classes met dezelfde naam gaan "clashen"
namespace KdG;

Class Student
{
    public string $name;
    public string $email;

    public function printDetails():string
    {
        return "{$this->name} ($this->email)";
    }
}
