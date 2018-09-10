# Database connection in PHP

## Object class

Fichier `database.php` :

```php
use \PDO as PDO;

class Database {

	private $host;
	private $port;
	private $login;
	private $password;
	private $dbname;
	private $pdo;

	public function __construct($db_host = 'localhost', $db_port = '3306', $db_user = 'root', $db_password = '', $db_name) {
		$this -> host = $db_host;
		$this -> port = $db_port;
		$this -> login = $db_user;
		$this -> password = $db_password;
		$this -> dbname = $db_name;
	}
	
	private function  getPDO() {
		if($this -> pdo === null) {
			$pdo = new PDO("mysql:host=$this->host; port=$this->port; dbname=$this->dbname", $this->login, $this->password);
			$pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$pdo -> exec('SET NAMES utf8');
			$this -> pdo = $pdo;
		}
		$pdoInsnced = $this -> pdo;
		return $pdoInsnced;
	}

	public function query($statement) {
		$requete = $this -> getPDO() -> query($statement);
		$datas = $requete -> fetchAll();
		return $datas;
	}	
}
```

## Use the object

Use the `database.php` object, here in the `index.php`

```php
include_once 'database.php';
$database = new Database(getenv("HOST"), getenv("PORT"), getenv("LOGIN"), getenv("PWD"), getenv("DB"));
```

## Environment file

Put in `.gitignore` the line `env.php` to not commit this login database file.

Change the parameters `localhost / 3306 / root /  / test` to your own parameters.
File `env.php` :

```php
putenv("HOST=localhost");
putenv("PORT=3306");
putenv("LOGIN=root");
putenv("PWD=");
putenv("DB=test");
```
