<?php
    include('./classes/Student.php');

    // Hier moet je dan de namepsace bijzetten
    $joske = new KdG\Student;
    $joske->setName('Joske Vermeulen');
    $joske->setEmail('joske@tramazantlei.be');

    echo $joske->printDetails();
