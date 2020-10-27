# Server Admin

This is a simple PHP project where you need to be authenticated to be able to add/remove server from the database

# Database

MySql database named server  
A `.sql` file is included to create the database  
The connection information can be found and edited in `app/Config/Config.php`

The database consist of the folowing 2 tables and fields

## user

id username password

## server

id name

# Test

Some test can be run with

```
./phpunit.phar --bootstrap autoload.php tests
```

# Info

To login you can use the folowing informations

```
user: admin
password: superS3cur3P@ssword
```
