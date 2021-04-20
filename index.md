## PHP Database Connection Class

The class contains methods for basic queries to a MySQL database. 
[Download the source files here](https://exsae-technologies.github.io/php-database-connection-class/downloads)

## Using the Database Connection Class
You can create classes that inherit from this class, these classes should represent the database tables in your database.

### How to use it
- Download the source files released [click here to download](https://exsae-technologies.github.io/php-database-connection-class/downloads)
- Extract the files in your project directory
- Create a class to inherit from the Db class in the php-database-class.php file from the extracted folder. This class should represent a table in your database
- Create a method and name it __init__, this method is required as it assigns the table name and fields to a particular instance of the class upon creations.
- Assign a table name to the table variable of the parent class i.e `$this->table = "table_name";`.
- Assign an array of field names in the same order as in the database table to the fields variable of the parent class i.e `$this->fields = ["field1"="initial_value", "field2"="initial_value", "field3"="initial_value"]`.
- Make sure your database table has id as the primary key with auto increment.
- Ommit the id field when defining fields.
- Feel free to add other methods to your child class or the Db class as you see fit for the work flow of your project.

### Example

In the code below Users is a databse table names User with fields id, username, email and password has been created a class inheriting from the Db class. Table name and coresponding fields without id have been initialised.
```markdown
require_once "database-connection.php";

class User extends Db{
	function __init__(){
		$this->table = "user";
		$this->fields = ["username"=>"", "email"=>"", "password"=>""];
	}
}
```
From here on basic queries can be made by just calling functions responsible for a particular query.
The example below selects all users in the database.
```markdown
$user = new User();
$all_users = $user->get_all();
```
