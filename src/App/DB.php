<?php
declare(strict_types=1);
namespace Cms\App;

use PDO;
use Exception;
use PDOException;
use Dotenv\Dotenv;

class DB
{
    private static ?PDO $instance = null;

    private function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = self::createConnection();
        }

        return self::$instance;
    }

    /**
     * @throws Exception
     */
    private static function createConnection(): PDO
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->safeLoad();

        $dbHost = $_ENV['DB_HOST'];
        $dbUser = $_ENV['DB_USER'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbName = $_ENV['DB_NAME'];

        $dsn = "mysql:host=$dbHost;dbname=$dbName";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO(
                $dsn, $dbUser, $dbPassword, $options
            );
        } catch (PDOException $exception) {
            throw new Exception("Connection failed: " . $exception->getMessage());
        }
    }
}
