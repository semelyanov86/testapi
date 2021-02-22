## Laravel Test api task

Installation instruction:
- Extract the archive and put it in the folder you want
- Run `cp .env.example .env` file to copy example file to `.env`
- Then edit your `.env` file with DB credentials and other settings.
- Run `composer install` command
- Run `php artisan migrate` command.
- Run `php artisan key:generate` command.

To run import script, enter following command:

`php artisan customers:import`
