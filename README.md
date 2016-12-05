Accommodation Rental System
============================

New Update 04/06/2016
-------------------
- Refer to the README before start your system.
- Remove empty file.
- Add some element at register page.
- Add notification badge.
- Add notification function to email.
- Change structure database.
- Change UI/UX
- Add booking and rejected function
- Add searching function.
- New dumpfile .sql at DB folder.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Download from an Archive File

Extract the archive file downloaded from [https://github.com/shahriltech/ars) to
a directory and rename master(name folder) to `ars` that is directly under the Web root.

You can then access the application through the following URL:

~~~
http://localhost/ars/web/index.php
~~~

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ars',
    'username' => 'root',
    'password' => '', //if default should be no password.
    'charset' => 'utf8',
];
```
Open http://localhost/phpmyadmin. Then create new database with name `ars`. After that import `ars.sql` into the `ars` database.

**NOTES:**

- Refer to the README before start your system.
