<?php
// delete-delivery.php — DELETE: removes one delivery sent by a POST-only small form.
require_once 'includes/db.php';

$date = isset($_POST['date']) ? trim($_POST['date']) : '';

// Reject direct GET visits and links because this request changes data.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: deliveries.php');
    exit;
}

$id = (int) ($_POST['delivery_id'] ?? 0);
$stmt = mysqli_prepare($conn, 'DELETE FROM milk_delivery WHERE delivery_id = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

// Redirect after deletion so reloading the list does not repeat the delete.
header('Location: deliveries.php?date=' . urlencode($date) . '&deleted=1');
exit;
