<?php
    include('./vendor/autoload.php');

    use KdG\Student;
    use KdG\Toolbox;
    use KdG\StaticCache;

    StaticCache::getInstance()->set('name', 'Sam Serrien');

    $joske = new Student;
    $joske->setEmail('joske@tramazantlei.be');

    echo Toolbox::bold($joske->printDetails());
