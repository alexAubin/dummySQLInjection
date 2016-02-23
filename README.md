Simple SQL injection
====================

Setup
-----

Create a dummy database on your server :

```
   $ mysql -u root -p

   mysql> CREATE DATABASE dummy;
   mysql> USE dummy;
```

Use www.generatedata.com to generate a simple MySQL table with fields called name, email, and creditCard. Import it in MySQL. Remember one of the names.

Grant permissions to a dummy user on your table :

```
   mysql> CREATE USER 'dummy'@'localhost' IDENTIFIED BY 'dummypassword';
   mysql> GRANT ALL PRIVILEGES ON dummy.myTable TO 'dummy'@'localhost';
```

Edit the database/table parameters in `index.php` if needed.

Usage
-----

Use the name you remembered to login... For instance `Donna Fox`. Read the
info you get.


Now try something like `Donna Fox' or '1'='1`

and notice how you access someone else's information.

