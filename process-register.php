<?php
// POST keeps application details out of the URL and sends them in the request body.
$page_title = 'Application received';
$routes = [
    '1' => 'Kiserian',
    '2' => 'Ngong',
    '3' => 'Rongai',
];
$is_post = $_SERVER['REQUEST_METHOD'] === 'POST';
$first = isset($_POST['first_name']) && is_string($_POST['first_name'])
    ? trim($_POST['first_name'])
    : '';
$last = isset($_POST['last_name']) && is_string($_POST['last_name'])
    ? trim($_POST['last_name'])
    : '';
$phone = isset($_POST['phone']) && is_string($_POST['phone'])
    ? trim($_POST['phone'])
    : '';
$route_code = isset($_POST['route']) && is_string($_POST['route'])
    ? $_POST['route']
    : '';
$has_application = $is_post && $first !== '' && $last !== '' && $phone !== ''
    && isset($routes[$route_code]);

include 'includes/header.php';
?>
<main>
  <?php if ($has_application): ?>
    <h2>Thank you, <?php echo htmlspecialchars($first . ' ' . $last, ENT_QUOTES, 'UTF-8'); ?></h2>
    <p>We have your application to join the <?php echo htmlspecialchars($routes[$route_code], ENT_QUOTES, 'UTF-8'); ?> route.</p>
    <p>The office will call you on <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?> when your member number is ready.</p>
  <?php elseif ($is_post): ?>
    <h2>Incomplete application</h2>
    <p>Please complete all the fields and choose a valid route.</p>
    <p><a href="register.php">Return to the membership form.</a></p>
  <?php else: ?>
    <h2>No application</h2>
    <p>This page answers the membership form. <a href="register.php">Fill it in first.</a></p>
  <?php endif; ?>
</main>
<?php include 'includes/footer.php'; ?>
