<?php
$dbname = "./courses.db"; 
$conn = new SQLite3($dbname);
if (!$conn) {
    die("Connection failed: " . $conn->lastErrorMsg());
}
