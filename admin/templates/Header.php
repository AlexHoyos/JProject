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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>