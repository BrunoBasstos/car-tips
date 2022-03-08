#CAR TIPS

A simple project useing laravel and livewire.

# Get Started

### 1. Requirements

- PHP 8.0.2 +
- Laravel 9.2 +
- Livewire 2x
- Tailwind

> **NOTE:** At the very ending of this file, I'll let the commands sequence one should run to get the containers up and your application running.

### 2.Dependencies

This project uses composer and npm to manage its dependencies. Before going any further, you should update composer
dependencies by runing the command below:

```
   composer update
```

### 3. Build

This project uses Laravel Sail to build up the default containers for a basic laravel application.

In order to get the container running, just navigate to this project's root folder and run the following command:

Before launching the container, you will want to create your environment file.

The .env.example file is a great start point to set your environment variables since it has all the variables the
application gonna need to run.

Running the command bellow, you will generate a .env file from the .env.example:

```
cp .env.example .env
```

Now you can run the following artian command to generate your app key:

```
php artisan key:generate
```

Then open your .env file for edition and replace the APP_URL and the database variables with the following values:

```
APP_URL=http://car-tips.test
.
.
.
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=car_tips
DB_USERNAME=sail
DB_PASSWORD=password
```

Then we are good to go and start up our container:

```
    ./vendor/bin/sail up -d
```

##### 3.1 Conflicts

If you have services running in your local machine, you may face some problemas, like ports not available.

In such case, you can either temporarily stop your services or change the ports you want the containers to listen.

Let's see how we could change mysql port for instance:

- open docker-compose.yml file
- locate the block related to mysql
- find the line which contains the ports forwards. Something like - '${FORWARD_DB_PORT:-3306}:3306'
- change the port, like so: - '${FORWARD_DB_PORT:-3306}:3306' to - '${FORWARD_DB_PORT:-3307}:3306'

### 4. Migrations

After you starts up the container, you should run the migrations to create the database tables:

```
   ./vendor/bin/sail artisan migrate:fresh 
```

If you want some sample data to be seeded into the tables, you can pass the optional argument --seed


```
   ./vendor/bin/sail artisan migrate:fresh --seed
```

A free car's database were downloaded and used for seeding the project database. Those files are placed inside
database/seeders/source-files-seeder.

Also some fake user will be created. One of them you can use for your first tests. Here are the credentials:

```
Email: admin@mail.com
Password: password
```

### 5. Assets

You may publish a fresh version of this project assets, you can make use of laravel mix webpack wrapper.

To do so, you can make use of the npm scripts set in package.json.

Before publiching assets, lets update npm dependencies:

```
   ./vendor/bin/sail npm update
```

Now you can publish the assets:

```
   ./vendor/bin/sail npm run dev
```

### 6.Tests

Some unit and feature tests were written to assert the funcinality of the given requirements.

In order t run the tests. call the comand bellow from your console:

```
    ./vendor/bin/sail artisan test
```

![image](https://user-images.githubusercontent.com/5402439/157088407-5f5106da-e593-4965-8c2f-a790f058e741.png)

### 7.Try it out

After all those steps, you can access this project by navigating to [http://localhost]() in your preferref web browser.

Thank you for reading till here!

Send your feedback, comments, sugestions...

I look forward to hearing from you!

Bruno.

#______________________________

##GETTING STARTED SEQUENCE

- ####updates dependencies

>composer update

- ####creates .env file

> cp .env.example .env

- ####generate app key

>php artisan key:generate

- ####REPLACE VARIABLES IN .env

```
APP_URL=http://car-tips.test
...
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=car_tips
DB_USERNAME=sail
DB_PASSWORD=password
```

- ####bulid/starts the containers

>./vendor/bin/sail up -d

- ####migrate the database

> ./vendor/bin/sail artisan migrate:fresh

- ####migrate the database with data

>./vendor/bin/sail artisan migrate:fresh --seed

- ####updates npm dependencies within the container

>./vendor/bin/sail npm update

- ####publishes the assets

>./vendor/bin/sail npm run dev

- ####run unit and feature tests

> ./vendor/bin/sail artisan test

- #####browse your app

>[http://localhost]()
