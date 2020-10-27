# Server Admin

this is a sample PHP project where you need to be authenticated to be able to add/remove server from the database

# database

MySql database named server  
a `.sql` file is included to create the database  
consist of the folowing 2 table and fields

## user

id username password

## server

id name

# Test

some test can be run with

```
./phpunit.phar --bootstrap autoload.php tests
```

# info

to login you can use the folowing informations

```
user: admin
password: superS3cur3P@ssword
```
