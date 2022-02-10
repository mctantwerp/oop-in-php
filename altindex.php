<?php
    include('./classes/Student.php');

    // Een andere manier om aan uw app duidelijk te maken uit welke namespace je Student wil gebruiken
    use KdG\Student;

    $joske = new Student;
    $joske->name = 'Joske Vermeulen';
    $joske->email = 'joske@tramazantlei.be';

    echo $joske->printDetails();
