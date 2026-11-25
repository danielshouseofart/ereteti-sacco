<?php
$page_title = 'Apply for membership';
include 'includes/header.php';
?>
  <main>
    <section>
      <h2>Membership</h2>
      <p>Farmers on the Kiserian, Ngong or Rongai route may apply for membership.</p>
      <p>Bring your national ID and bank account details to the office or your nearest collection centre.</p>
    </section>
    <form action="process-register.php" method="post">
      <label for="first-name">First name</label>
      <input type="text" id="first-name" name="first_name" required>
      <label for="last-name">Last name</label>
      <input type="text" id="last-name" name="last_name" required>
      <label for="phone">Phone number</label>
      <input type="tel" id="phone" name="phone" required>
      <label for="route">Route</label>
      <select id="route" name="route" required>
        <option value="">Choose a route</option>
        <option value="1">Kiserian</option>
        <option value="2">Ngong</option>
        <option value="3">Rongai</option>
      </select>
      <button type="submit">Apply to join</button>
    </form>
  </main>
<?php include 'includes/footer.php'; ?>