<?php

$conn = new mysqli('localhost', 'root', '', 'agenda_php');

if ($conn->connect_error) {
    echo $error = $conn->connect_error;
}

?>