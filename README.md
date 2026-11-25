# FreshBytes setup

FreshBytes now runs as a PHP site. Serve this folder through Apache or another
PHP-enabled web server; opening the pages directly as files will not run PHP.

1. Import `database.sql` into MySQL or MariaDB. It creates the `freshbytes_web`
   database and the `intake_requests` table.
2. Configure the database connection with `FRESHBYTES_DB_HOST`,
   `FRESHBYTES_DB_USER`, `FRESHBYTES_DB_PASSWORD`, and optionally
   `FRESHBYTES_DB_NAME`. Defaults are `localhost`, `root`, an empty password,
   and `freshbytes_web`.
3. Open `index.php` through the local web server. Intake submissions from
   `contact.php` are validated and saved to MySQL.

The public pages share `includes/header.php` and `includes/footer.php`.
