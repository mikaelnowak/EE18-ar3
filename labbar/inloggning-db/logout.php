<?php
include "./resurser/conn.php";
session_start();
session_destroy();
header("Location: ./login.php");