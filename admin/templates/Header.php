<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/APP/main.php';
    if(isset($_SESSION["uid"])){

        $admin = Admin::getById($_SESSION["uid"]);
        if($admin==null)
            header("Location: ".WEB_URL);
            
    } else {
        header("Location: ".WEB_URL);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        main {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>