<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$db_host = getenv('FRESHBYTES_DB_HOST') ?: 'localhost';
$db_user = getenv('FRESHBYTES_DB_USER') ?: 'root';
$db_password = getenv('FRESHBYTES_DB_PASSWORD') ?: '';
$db_name = getenv('FRESHBYTES_DB_NAME') ?: 'freshbytes_web';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
$conn->set_charset('utf8mb4');
=======
$conn = mysqli_connect('localhost', 'root', '', 'ereteti_web');
mysqli_set_charset($conn, 'utf8mb4');
