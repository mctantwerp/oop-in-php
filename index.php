<?php
    include('./classes/Student.php');

    // Hier moet je dan de namepsace bijzetten
    $joske = new KdG\Student;
    $joske->name = 'Joske Vermeulen';
    $joske->email = 'joske@tramazantlei.be';

    echo $joske->printDetails();