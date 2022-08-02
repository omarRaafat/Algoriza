# Algoriza PHP TASK With Auto Xode Updates (Automated Page reload On Code Build)
- Laravel 9.0


# Requirments:
- PHP 8.0 or later.
- MySQL 5.7 or later.

## installation
after clone/ download the project file, `cd` into the project directory and follow the steps below:

- run `composer install` for download the required packages.
	- run `php artisan make:database-instance algoriza mysql` to create new database instance
	- run `cp .env.example .env` to copy env file.
	- run `php artisan key:generate` to generate new app key.
- run `php artisan migrate` to run database migration. 
- run `npm install && npm run dev` for compiling your fresh scaffolding.
- run `php artisan serve` to deploy the module
### NOTE
if you get any errors in this step, when seeding the database, realted to exsisting data, please run the following:
- run `php artisan config:cache` to reset setting to is last good case.
- run `chmod ugo=rwx storage -R` to give permissions to storage folder for read/wirte actions.
- run `chown www-data storage -R` for the same reason described above.






# algoriza
