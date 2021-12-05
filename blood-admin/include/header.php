<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= @$title ?></title>
    <link rel="stylesheet" href="layout/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="layout/css/main.css" rel="stylesheet" media="all">
    </head>
<body style="<?= isset($login) && $login == true ? "background-color:#cccccc7a" : ""  ?>">