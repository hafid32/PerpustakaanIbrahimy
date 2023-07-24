<?php

function koneksi($host, $user, $password, $db)
{
    $koneksi = new mysqli($host, $user, $password, $db);
    return $koneksi;
}
