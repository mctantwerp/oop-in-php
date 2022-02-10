<?php
    include('./classes/Student.php');

    $joske = new Student;
    $joske->name = 'Joske Vermeulen';
    $joske->email = 'joske@tramazantlei.be';

    echo $joske->printDetails();
