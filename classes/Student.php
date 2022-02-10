<?php

Class Student
{
    public string $name;
    public string $email;

    public function printDetails():string
    {
        return "{$this->name} ($this->email)";
    }
}
