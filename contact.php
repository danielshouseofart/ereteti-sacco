<?php
$plans = [
    'balance' => 'Balance',
    'lean' => 'Lean & active',
    'sugar' => 'Managed sugar',
    'family' => 'Family',
];
$form = [
    'name' => '',
    'phone' => '',
    'email' => '',
    'plan' => 'balance',
    'allergies' => '',
];
$errors = [];

session_start();
$submitted = isset($_SESSION['intake_submitted']);
unset($_SESSION['intake_submitted']);
if (!isset($_SESSION['intake_csrf_token'])) {
    $_SESSION['intake_csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (array_keys($form) as $field) {
        if (isset($_POST[$field]) && is_string($_POST[$field])) {
            $form[$field] = trim($_POST[$field]);
        }
    }

    $csrf_token = isset($_POST['csrf_token']) && is_string($_POST['csrf_token'])
        ? $_POST['csrf_token']
        : '';
    if (!hash_equals($_SESSION['intake_csrf_token'], $csrf_token)) {
        $errors[] = 'Your form session expired. Please reload the page and try again.';
    }
    if ($form['name'] === '' || strlen($form['name']) > 120) {
        $errors[] = 'Enter your name (up to 120 characters).';
    }
    if (!preg_match('/^[0-9+(). -]{7,32}$/', $form['phone'])) {
        $errors[] = 'Enter a valid phone number.';
    }
    if ($form['email'] !== '' && (
        strlen($form['email']) > 254
        || filter_var($form['email'], FILTER_VALIDATE_EMAIL) === false
    )) {
        $errors[] = 'Enter a valid email address, or leave it blank.';
    }
    if (!isset($plans[$form['plan']])) {
        $errors[] = 'Choose one of the listed meal plans.';
    }
    if (strlen($form['allergies']) > 2000) {
        $errors[] = 'Keep allergy and food-avoidance notes under 2,000 characters.';
    }

    if (count($errors) === 0) {
        try {
            require __DIR__ . '/includes/db.php';
            $stmt = $conn->prepare(
                'INSERT INTO intake_requests (full_name, phone, email, plan, allergies)
                 VALUES (?, ?, ?, ?, ?)'
            );
            $full_name = $form['name'];
            $phone = $form['phone'];
            $email = $form['email'] === '' ? null : $form['email'];
            $plan = $form['plan'];
            $allergies = $form['allergies'];
            $stmt->bind_param('sssss', $full_name, $phone, $email, $plan, $allergies);
            $stmt->execute();

            unset($_SESSION['intake_csrf_token']);
            $_SESSION['intake_submitted'] = true;
            header('Location: contact.php');
            exit;
        } catch (mysqli_sql_exception $e) {
            error_log('FreshBytes intake request could not be saved: ' . $e->getMessage());
            $errors[] = 'We could not save your request right now. Please try again or contact us by phone.';
        }
    }
}

$page_title = 'Contact us';
include __DIR__ . '/includes/header.php';
?>
<main>
<section>
      <h2>Book your intake call</h2>
      <p>Fill this in and a nutritionist will phone you to plan your week.</p>
      <?php if ($submitted): ?>
        <p class="success" role="status">Thanks — your intake request has been received. A nutritionist will contact you soon.</p>
      <?php endif; ?>
      <?php if (count($errors) > 0): ?>
        <div class="message" role="alert">
          <p>Please check the following:</p>
          <ul>
            <?php foreach ($errors as $error): ?>
              <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
      <form action="contact.php" method="post">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['intake_csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
        <div>
          <label for="name">Your name</label>
          <input type="text" id="name" name="name" maxlength="120" value="<?php echo htmlspecialchars($form['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div>
          <label for="phone">Phone number</label>
          <input type="tel" id="phone" name="phone" maxlength="32" value="<?php echo htmlspecialchars($form['phone'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>
        <div>
          <label for="email">Email (optional)</label>
          <input type="email" id="email" name="email" maxlength="254" value="<?php echo htmlspecialchars($form['email'], ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div>
          <label for="plan">Plan you're interested in</label>
          <select id="plan" name="plan" required>
            <?php foreach ($plans as $plan_value => $plan_label): ?>
              <option value="<?php echo htmlspecialchars($plan_value, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $form['plan'] === $plan_value ? ' selected' : ''; ?>><?php echo htmlspecialchars($plan_label, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label for="allergies">Allergies or foods to avoid</label>
          <textarea id="allergies" name="allergies" rows="3" maxlength="2000"><?php echo htmlspecialchars($form['allergies'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div>
          <button class="btn" type="submit">Book my call</button>
        </div>
      </form>
    </section>

    <section>
      <h2>Visit or write to us</h2>
      <address>
        FreshBytes<br>
        Westlands, Nairobi<br>
        Kenya
      </address>
    </section>

    <section>
      <h2>Call or email</h2>
      <ul>
        <li><a href="tel:+254720000000">0720 000 000</a> for orders and sign-ups</li>
        <li><a href="mailto:hello@freshbytes.co.ke">hello@freshbytes.co.ke</a></li>
      </ul>
    </section>
</main>
<aside>
<h2>Office hours</h2>
    <p>Monday to Saturday, 7am to 7pm. Closed Sundays.</p>
</aside>
<?php include __DIR__ . '/includes/footer.php'; ?>
