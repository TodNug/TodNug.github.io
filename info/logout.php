<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("Location: login");
    exit;
}
unset($_SESSION["user"]);

header("location: ../");