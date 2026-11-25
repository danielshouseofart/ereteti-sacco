<?php
// process-delivery.php — CREATE: records one delivery sent by the form on deliveries.php.
require_once 'includes/db.php';

// 1 · Only a form sent by POST may record a delivery.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: deliveries.php');
    exit;
}

// 2 · Read what was sent, and tidy text values.
$member = isset($_POST['member_no']) ? strtoupper(trim($_POST['member_no'])) : '';
$date = isset($_POST['delivery_date']) ? trim($_POST['delivery_date']) : '';
$session = isset($_POST['session']) ? trim($_POST['session']) : '';
$litres = isset($_POST['litres']) ? trim($_POST['litres']) : '';

// 3 · Check every value again on the server.
$errors = [];
if (!preg_match('/^ER-[0-9]{4}$/', $member)) {
    $errors[] = 'The member number must be ER- and four digits, such as ER-0001.';
}
if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $date)) {
    $errors[] = 'Choose the date of the delivery.';
}
if ($session !== 'MORNING' && $session !== 'EVENING') {
    $errors[] = 'Choose the morning or the evening session.';
}
if (!is_numeric($litres) || (float) $litres <= 0 || (float) $litres > 60) {
    $errors[] = 'Litres must be more than 0 and at most 60.';
}

// 4 · Find the farmer with a prepared SELECT.
$farmer = null;
if (count($errors) === 0) {
    $stmt = mysqli_prepare($conn, 'SELECT farmer_id FROM farmer WHERE member_no = ?');
    mysqli_stmt_bind_param($stmt, 's', $member);
    mysqli_stmt_execute($stmt);
    $farmer = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    if ($farmer === null) {
        $errors[] = 'No farmer has the member number ' . $member . '.';
    }
}

// 5 · Save the delivery with a prepared INSERT.
if (count($errors) === 0) {
    $stmt = mysqli_prepare(
        $conn,
        'INSERT INTO milk_delivery (farmer_id, delivery_date, session, litres)
         VALUES (?, ?, ?, ?)'
    );
    $litresValue = (float) $litres;
    mysqli_stmt_bind_param($stmt, 'issd', $farmer['farmer_id'], $date, $session, $litresValue);

    try {
        mysqli_stmt_execute($stmt);
        header('Location: deliveries.php?date=' . urlencode($date) . '&saved=1');
        exit;
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            // 1062 means this farmer already has a delivery for this date and session.
            $errors[] = $member . ' has already delivered in the '
                . strtolower($session) . ' session on ' . $date . '.';
        } else {
            throw $e;
        }
    }
}

// 6 · Explain any validation or database error in plain words.
$page_title = 'Delivery not recorded';
include 'includes/header.php';
?>
<main>
  <h2>The delivery was not recorded</h2>
  <ul>
  <?php foreach ($errors as $error): ?>
    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
  <?php endforeach; ?>
  </ul>
  <p><a href="deliveries.php">Back to the deliveries</a></p>
</main>
<?php include 'includes/footer.php'; ?>
