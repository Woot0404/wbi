<?php
session_start();
unset($_SESSION["teacher_id"]);
unset($_SESSION["tea_full"]);
header("Location:../");
?>