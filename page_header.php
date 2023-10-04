<?php 
session_start();
if(!isset($_SESSION['userName'])){ header('location:index.php');}
require 'Connection.php';                
 ?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>LMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
 
<link href="./main.css" rel="stylesheet">
<link href="./assets/scripts/dt/datatables.min.css" rel="stylesheet">
<link href="./assets/scripts/bootstrap.min.css" rel="stylesheet">
<link href="./assets/scripts/jquery-ui.min.css" rel="stylesheet">
<link href="./assets/scripts/responsive.bootstrap.css" rel="stylesheet">
<link href="./assets/scripts/buttons.bootstrap.min.css" rel="stylesheet">
<link href="./assets/scripts/dataTables.bootstrap.css" rel="stylesheet">
<script src="./assets/scripts/jquery-1.12.4.min.js"></script>
</head>

<body>