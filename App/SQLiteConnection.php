<?php
namespace App;

/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private static $pdo;
    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
		 
        if (self::$pdo == null) {
            self::$pdo = new \PDO("sqlite:" . Config::SQLITE_FILE);
        }
        return self::$pdo;
    }
	
	public static function getPdo()
	{
		return self::$pdo;
	}
}