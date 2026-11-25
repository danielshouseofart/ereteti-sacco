<?php
$page_title = 'Home';
include __DIR__ . '/includes/header.php';
?>
<main>
<section class="hero">
      <div>
        <h2>Meals built around you, not a menu board</h2>
        <p>FreshBytes plans every meal around your goals, your allergies and
        whatever is good in Nairobi's markets this week. Tell us what you're
        working toward and we will build a meal plan around you.</p>
        <p>
          <a class="btn" href="pricing.php">See the plans</a>
          <a class="btn btn-alt" href="menu.php">Browse the menu</a>
        </p>
      </div>
      <img src="img/hero.svg" alt="A bowl seen from above with greens, tomatoes, avocado, grilled chicken and brown rice" width="640" height="480">
    </section>

    <section>
      <h2>What makes us different</h2>
      <div class="card-row">
        <div class="card">
          <h3>A nutritionist, not a quiz</h3>
          <p>Your plan starts with a real phone call. We ask about your goals,
          your allergies and what you actually like to eat.</p>
        </div>
        <div class="card">
          <h3>Cooked fresh in Nairobi</h3>
          <p>Our kitchen buys from local markets and cooks for the week ahead.
          Nothing sits in a freezer for months.</p>
        </div>
        <div class="card">
          <h3>Meals made for your week</h3>
          <p>Your weekly menu is planned around your goals, food preferences
          and the ingredients in season.</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Four plans for four kinds of week</h2>
      <div class="card-row plans">
        <div class="card">
          <img src="img/plan-balance.svg" alt="Grilled tilapia, sukuma wiki and ugali on a white plate" width="400" height="300">
          <h3>Balance</h3>
          <p>Well-rounded everyday meals for people with no special medical goal.</p>
          <p class="price">KES 4,500 a week</p>
        </div>
        <div class="card">
          <img src="img/plan-lean.svg" alt="Grilled chicken, broccoli and sweet potato cubes on a plate" width="400" height="300">
          <h3>Lean &amp; active</h3>
          <p>More protein and controlled portions for training or weight management.</p>
          <p class="price">KES 5,200 a week</p>
        </div>
        <div class="card">
          <img src="img/plan-sugar.svg" alt="Lentil stew, spinach, brown rice and tomato slices on a plate" width="400" height="300">
          <h3>Managed sugar</h3>
          <p>Low glycaemic meals planned with a nutritionist for diabetes or pre-diabetes.</p>
          <p class="price">KES 5,500 a week</p>
        </div>
        <div class="card">
          <img src="img/plan-family.svg" alt="A big shared pot of stew surrounded by four small plates" width="400" height="300">
          <h3>Family</h3>
          <p>Bigger portions and gentler flavours, cooked for a household of four.</p>
          <p class="price">KES 14,000 a week</p>
        </div>
      </div>
    </section>

    <section class="call-out">
      <h2>Ready to eat better next week?</h2>
      <p>Requests for next week's meal plans close on Thursday at 6pm.</p>
      <a class="btn" href="contact.php">Book your intake call</a>
    </section>
</main>
<aside>
<h2>This week's notice</h2>
    <p>New meal-plan requests close every Thursday at 6pm for the following
    week.</p>
</aside>
<?php include __DIR__ . '/includes/footer.php'; ?>
$page_title = 'Welcome to Ereteti';
include 'includes/header.php';
?>

  <main>
    <section>
      <h2>Milk collected twice a day,
          paid once a month</h2>
      <p>Ereteti Dairy Sacco has collected milk on
      the Ngong road since 1998. Around eight hundred
      farmers deliver to us twice a day, and we pay
      for every accepted litre once a month.</p>
      <p>Any farmer on one of our three routes may
      join. You need a national ID and a bank account,
      and you may deliver from the day your
      membership number is issued.</p>
    </section>

    <section>
      <h2>Where we collect</h2>
      <ul class="route-cards">
        <li><a href="routes.php">Kiserian route</a>
        </li>
        <li><a href="routes.php">Ngong route</a></li>
        <li><a href="routes.php">Rongai route</a></li>
      </ul>
      <img src="img/collection-centre.jpg"
           alt="Farmers queuing with churns at
                the Kiserian centre">
    </section>
  </main>

<?php include 'includes/footer.php'; ?>
