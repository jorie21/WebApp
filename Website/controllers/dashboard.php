<?php

$lastName = ""; 
$studentModel = new StudentModel();

if(isset($_SESSION['studentNo'])) {
    $lastName = $studentModel->getStudentLastName($_SESSION['studentNo']);
}

$cards = $studentModel->GetStudentScheduleByStudentNo($_SESSION['studentNo']);

$schedules = $studentModel->GetAllSchedule();


