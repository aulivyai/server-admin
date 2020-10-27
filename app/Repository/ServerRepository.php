<?php

namespace Admin\App\Repository;

use Admin\App\Components\Database;
use Admin\App\Config\Config;
use Admin\App\Entity\Server;

class ServerRepository
{

    private $database;

    public function __construct()
    {
        $config = Config::$data["database"];
        $this->database = new Database($config["hostname"], $config["username"], $config["password"], $config["dbname"]);
    }

    public function getServerList()
    {
        $serverArray = $this->database->fetch("SELECT * FROM server");
        $servers = [];
        foreach ($serverArray as $serverItem) {
            $server = new Server();
            $server->setId($serverItem["id"]);
            $server->setName($serverItem["name"]);
            $servers[] = $server;
        }
        return $servers;
    }

    public function addServer(Server $server)
    {
        $this->database->execute("INSERT INTO server (name) VALUES ( :name )", ["name" => $server->getName()]);
    }


    public function removeServer(Server $server)
    {
        $this->database->execute("DELETE FROM server WHERE id = :id", ["id" => $server->getId()]);
    }
}
