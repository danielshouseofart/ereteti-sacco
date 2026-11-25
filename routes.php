<?php
require_once 'includes/db.php';
$page_title = 'Our routes';
$sql = 'SELECT route_name, collection_centre FROM route ORDER BY route_id';
$result = mysqli_query($conn, $sql);
include 'includes/header.php';
?>
<main>
  <label for="route-search">Find a route or a centre</label>
  <input type="search" id="route-search" placeholder="e.g. Ngong">
  <p id="route-count" aria-live="polite"></p>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <section>
      <h2><?php echo htmlspecialchars($row['route_name'], ENT_QUOTES, 'UTF-8'); ?> route</h2>
      <p>Milk is cooled at <?php echo htmlspecialchars($row['collection_centre'], ENT_QUOTES, 'UTF-8'); ?>.</p>
    </section>
  <?php endwhile; ?>
</main>
<?php include 'includes/footer.php'; ?>
