# guesschan
## A game for guessing which 4chan board a post comes from

This was built with PHP using the CodeIgniter 3 Framework, jQuery, and the 4chan API.

No database is involved. 4chan data is cached in json files at `application/json`.

These cache files are updated everytime application/cron.php is run.

It's suggested you set up a cron for `application.cron.php`. `*/10 * * * *` should be more than enough.

Update the auth_token in `application/config/constants.php` and `application/cron.php` when deploying to production.

Cron can also be triggered by going to example.com/main/download_4chan/(auth_token here)

As always, ensure htaccess rewrite is on, file permissions are correct, and don't abuse the 4chan api.

You may want to disable `force_ssl()`.