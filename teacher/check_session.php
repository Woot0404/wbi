<?php
session_start();
if (!isset($_SESSION["teacher_id"])&&!isset($_SESSION["tea_full"])) {
    header("Location:../");
}else{
    $teacher_id = $_SESSION["teacher_id"];
    $tea_fullName = $_SESSION['tea_full'];
}
