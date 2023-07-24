<?php
include "config_database.php";
const hostname = 'localhost';
const username = 'root';
const password = '';
const database = 'mydatabase';
$db = koneksi(hostname, username, password, database);

function base_url()
{
    $base_url = "http://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    return $base_url;
}