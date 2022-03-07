#CAR TIPS
A simple project useing laravel and livewire.

#Get Started
###1. Requirements
- PHP 8.0.2 +
- Laravel 9.2 +
- Livewire 2x
- Tailwind 

###2. Build
This project uses Laravel Sail to build up the default containers for a basic laravel application.

In order to get the container running, just navigate to this project's root folder and run the following command:

```
    ./vendor/bin/sail up -d
```

###3. Migrations
After you starts up the container, you should run the migrations to create the database tables:

```
   ./vendor/bin/sail artisan migrate:fresh 
```

If you want some sample data to be seeded into the tables, you can pass the optional argument --seed

```
   ./vendor/bin/sail artisan migrate:fresh --seed
```

A free cars database were downloaded and used for seeding the project database. Those files are placed inside database/seeders/source-files-seeder.

Also some fake user will be created. One of them you can use for your first tests. Here are the credentials:

```
Email: admin@mail.com
Password: password
```

###4.Dependencies and assets
Update composer and npm dependencies by runing the commands below:

```
   ./vendor/bin/sail composer update
```

```
   ./vendor/bin/sail npm update
```

###5.Tests

Some unit and feature tests were written to assert the funcinality of the given requirements.

In order t run the tests. call the comand bellow from your console:

```
./vendor/bin/sail artisan test
```

![image](https://user-images.githubusercontent.com/5402439/157088407-5f5106da-e593-4965-8c2f-a790f058e741.png)


###6.Try it out
After all those steps, you can access this project by navigating to [http://localhost]() in your preferref web browser.

Thank you for reading till here!

Send your feedback, comments, sugestions...

I look forward to hearing from you!

Bruno,
