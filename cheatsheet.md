# OOP

## Simple class (ex1)

### classes\Student.php

```php
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
```

### index.php

```php
<?php
    include('./classes/Student.php');

    $joske = new Student;
    $joske->name = 'Joske Vermeulen';
    $joske->email = 'joske@tramazantlei.be';

    echo $joske->printDetails();
```

## Namespaces (ex2)

```php
// Namespace aan class toevoegen
namespace KdG;

// Gebruiken =

$joske = new KdG\Student;

// OF

use KdG\Student;
```

## Setters en getters (ex3)

```php
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
```

## Static classes (ex4)

### Simple static method

```php
Class Toolbox
{
    public static function bold(string $string): string
    {
        return "<strong>{$string}</strong>";
    }
}
```

## Autoloading (manually) (ex5)

### includes/autoloader.php

```php
<?php

// Hiermee zeg je dat vanaf een class wordt aangeroepen je deze gaat proberen in te laten zodat deze niet onnodig wordt ingeladen
spl_autoload_register('myAutoLoader');

function myAutoLoader($class)
{
    $parts = explode('\\', $class);
    include "classes/". end($parts) . '.php';
}
```

### index.php

```php
include('./includes/autoloader.php');
```

## Autoloading (via composer.json) (ex6)

```bash
composer init
```

### composer.json

```json
{
    "name": "kdg/oop-in-php",
    "type": "project",
    "autoload": {
        "psr-4": {
            "KdG\\": "classes/"
        }
    },
    "authors": [
        {
            "name": "Sam Serrien",
            "email": "sam.serrien@kdg.be"
        }
    ],
    "require": {}
}
```

### index.php

```php
include('./vendor/autoload.php');
```

## Singleton design pattern (ex7)

Zorgt ervoor dat er maar 1 instantie van een class kan bestaan.

### classes/StaticCache.php

```php
<?php

namespace KdG;

class StaticCache
{
    private static $instance = null;
    private $cache = [];

    /**
     * Private constructor to prevent direct instantiation.
     */
    private function __construct(){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new StaticCache();
        }

        return self::$instance;
    }

    public function set($key, $value)
    {
        $this->cache[$key] = $value;
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->cache)) {
            return $this->cache[$key];
        }

        return null;
    }
}
```

### classes/Student.php

```php
public function printDetails():string
{
    if(empty($this->name))
    {
        $this->name = StaticCache::getInstance()->get('name');
    }
    return "{$this->name} ($this->email)";
}
```

### index.php

```php
StaticCache::getInstance()->set('name', 'Sam Serrien');
```

## Singleton with easy access (magic method) (ex8)

### classes/StaticCache.php

Methods public > private.

```php
<?php

namespace KdG;

class StaticCache
{
    private function set($key, $value)
    {
        ...
    }

    private function get($key)
    {
        ...
    }

    /**
     * For easy access
     */
    public static function __callStatic($chrMethod, $arrArguments)
    {
        $instance = self::getInstance();

        return call_user_func_array(array($instance, $chrMethod), $arrArguments);
    }
}
```

### classes/Student.php

```php
...
$this->name = StaticCache::get('name');
```

### index.php

```php
...
StaticCache::set('name', 'Sam Serrien');
...
```
