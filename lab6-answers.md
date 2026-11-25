# Lab 6 — my answers

Name: … · Admission number: …

1. PHP checks the member number again because browser validation is only a first, user-facing check and can be skipped by changing JavaScript, using developer tools, or sending a custom HTTP request. The server must validate the same rule before it queries or writes the database.

2. In my INSERT, `bind_param('issd', ...)` uses `i` for the integer farmer ID, `s` for the string delivery date, `s` for the string session, and `d` for the decimal litres value. This keeps each value separate from the SQL statement.

3. Delete uses a POST form because it changes data and should not happen when a browser follows a link or preview fetches a page. Edit uses a link because it only opens a page and is not itself a data-changing request; submitting the edit form saves with POST.

4. The injection text is used as the value for the date parameter, and it does not match any delivery, so the page shows no deliveries. A prepared statement sends the SQL and date value separately; the database binds the text as data rather than treating quotes or `OR '1'='1` as SQL syntax.
