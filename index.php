<?php
    include('./includes/autoloader.php');

    use KdG\Student;
    use KdG\Toolbox;

    // Hier moet je dan de namepsace bijzetten
    $joske = new Student;
    $joske->setName('Joske Vermeulen');
    $joske->setEmail('joske@tramazantlei.be');

    echo Toolbox::bold($joske->printDetails());
