<?php

function Redirect($path) {
    header("Location: $path");exit();
}

function Refresh(){
    $path = $_SERVER["PHP_SELF"];
    $path .= !empty($_SERVER["QUERY_STRING"]) ? "?" . $_SERVER["QUERY_STRING"] : "";
    header("Location: $path");
}