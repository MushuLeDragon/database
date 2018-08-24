# Database connection in PHP

Put in `.gitignore` the line `env.php` to not commit this login database file.

Change the parameters `localhost / 3306 / root /  / my_database` to your own parameters.

```php
putenv("HOST=localhost");
putenv("PORT=3306");
putenv("LOGIN=root");
putenv("PWD=");
putenv("DB=my_database");
```
