# Ereteti database setup

Import `database.sql` into MySQL or MariaDB before opening the PHP application.
The script creates the `ereteti_web` database and its route, farmer, and
milk-delivery tables, then seeds the three routes used by the site.

The existing connection settings are in `includes/db.php` and currently use
the local MySQL `root` account with no password. Change those settings to match
your local database account before deployment.
