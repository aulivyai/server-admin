<?php

namespace App\Components;

use PDO;
use PDOException;


class Database
{
    private $hostname;

    private $username;

    private $password;

    private $dbname;

    private $connection;

    /**
     * connect to the database
     * return an error string if the connection is not successful
     * @param string $hostname
     * @param string $username
     * @param string $password
     * @param string $dbname
     * @return string
     */
    function __construct($hostname, $username, $password, $dbname)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        try {
            $this->connection = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    /**
     * execute a query
     * @param string $query the query to execute
     * @param string $data the data to pass to the query
     * @return void
     */
    function execute($query, $data)
    {
        $this->connection->beginTransaction();

        $stmt = $this->connection->prepare($query);

        $stmt->execute($data);

        $this->connection->commit();
    }

    /**
     * fetch query
     * @param string $query the query to execute
     * @param string $data the data to pass to the query
     * @return array the returned data from database
     */
    function fetch($query, $data = [])
    {

        $this->connection->beginTransaction();
        $stmt = $this->connection->prepare($query);
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        $this->connection->commit();

        return $result;
    }

    /**
     * close the connection
     */
    function close()
    {
        $this->connection = null;
    }
}
