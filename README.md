# Applicants (educational task)

The site for registration of applicants and display of list of them.

## Features
+ Using of a SQL database to store records
+ Using cookies to be able to edit your own profile
+ Searching
+ Pagination

## Requirements
+ PHP 7.4
+ MySQL 8.0
+ NodeJS 14.16 + npm
+ Composer

## Setup

1. run in the project dir:
    ```bash
    $ composer install
    $ npm install
    ```

2. configure [db_config.ini](./db_config.ini) corresponding to your settings

3. to create a required table:
    ```bash
    $ php -f fill_db.php init
    ```
    + to generate random fields *(optional)*:
    ```bash
    $ php -f fill_db.php [number_of_records]
    ```

    e.g.:
    ```bash
    $ php -f fill_db.php 100
    ```

4. to run webpack in dev mode:
    ```bash
    $ npm run start