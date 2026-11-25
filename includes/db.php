<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect('localhost', 'root', '', 'ereteti_web');
mysqli_set_charset($conn, 'utf8mb4');
