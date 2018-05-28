### One class to rule them All 😎
> One class to rule them all: declare
a generic class to select, add,
update, and delete from a MySQL
database.

> The objective is to apply OOP principles in PHP

### Instructions
- Create a database named **oop**
- Create the following tables;
  - **user**
    - id - integer,autoincrement
    - name - text
    - phone_number - varchar(20)
    - country_id - integer
  - **role**
    - id - integer,autoincrement
    - name - text
  - **permission**
    - id - integer,autoincrement
    - name - text
  - **role_permission**
    - id - integer,autoincrement
    - role_id - integer (fk : role_table)
    - permission_id -  integer (fk : permission table)
    - user_id : integer,autoincrement(fk : user table)
- Submit your schema on google classroom
- Create classes inline with OOP principles explored so far for database CRUD

### Concepts covered
- OOP principles
- PHP Data Objects
- Namespaces
- Aliasing & importing

#### 1. Creating a simple class
```php
//using namespaces
namespace DB;
//aliasing
use \PDO as PDO ;

//class block
class Database{

  //properties
  //we use public,private or protected access modifiers
  private $conn;
  private $db;

  //constructor definition
  //notice the syntactic variation with other languages
  public function __construct(){



  }

  //class methods/properties
  public function close(){
    //closes a database connection
  }
}
```
#### 2. PDO (Persistent data objects)
- Read the reference added below [(The only proper) PDO tutorial](https://phpdelusions.net/pdo) some considerations;
  - What advantages does PDO have over MySQL and MySQLi?

  ```php

  //security,usability,reusability
  ```

  - How do you connect to the database using PDO?

  ```php
  $pdo = new PDO($dsn, $user, $pass, $additional_options);
  ```

  - What are the two ways of running queries in PDO?

    ```php
  //using query()
  query();

  //using prepared statements
  prepare();
  execute();
  //for example
  $stmt = $pdo->query('SELECT * FROM users');
  ```

  - Getting data out of a statement.fetch()
    - Some fetch modes
      - PDO::FETCH_NUM returns enumerated array
      - PDO::FETCH_ASSOC returns associative array
      - PDO::FETCH_BOTH - both of the above
      - PDO::FETCH_OBJ returns object
    - PDO::FETCH_LAZY allows all three (numeric associative and object) methods without memory overhead.
  ```

  - Getting data from statement.fetchColumn()

  ```php

  //Returns value of the singe field of returned row
  ```

  - Getting data from statement fetchAll()

  ```php

    //returns an array that consists of all the rows returned by the query
    //You can change the row format using row formatting constants

    //Getting key-value pairs.
    PDO::FETCH_ASSOC
//Getting key-value pairs.
    PDO::FETCH_COLUMN
  //Getting key-value pairs.
    PDO::FETCH_KEY_PAIR
  //Getting rows indexed by unique field
    PDO::FETCH_UNIQUE
  ```

  - How do you report PDO errors?

  ```php

  // Set PDO in exception mode.

  // Do not use try..catch to report errors.

  // Configure PHP for proper error reporting on a live site set display_errors=off and log_errors=on on a development site, you may want to set display_errors=on of course, error_reporting has to be set to E_ALL in both cases
  ```

### References

1. Chapter 6 & 8 - Programming PHP. Kevin Tatroe, Peter MacIntyre and Rasmus Lerdorf
2. [(The only proper) PDO tutorial](https://phpdelusions.net/pdo) 🔥 🔥 🔥 🔥
2. [PDO vs. MySQLi: Which Should You Use?](https://code.tutsplus.com/tutorials/pdo-vs-mysqli-which-should-you-use--net-24059)
3. [PHP Data Objects](http://php.net/manual/en/book.pdo.php)
4. [PHP Namespaces](http://php.net/manual/en/language.namespaces.rationale.php)
5. [Using namespaces: Aliasing/Importing](http://php.net/manual/en/language.namespaces.importing.php)
6. [Composer dependency manager](https://getcomposer.org/)
7. [PDO's query vs execute](https://stackoverflow.com/questions/4700623/pdos-query-vs-execute)


### Credits

- [KLogger](https://github.com/katzgrau/KLogger)
- [(The only proper) PDO tutorial](https://phpdelusions.net/pdo)  🔥 🔥 🔥 🔥

>"It is not the strength of your faith but the _object of your faith_ that actually saves you." Timothy Keller ✍✍
