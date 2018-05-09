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
