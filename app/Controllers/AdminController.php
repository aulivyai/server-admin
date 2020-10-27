<?php

namespace App\Controllers;

use App\Components\Database;
use App\Components\Template;
use App\Config\Config;
use App\Entity\Server;
use App\Repository\ServerRepository;

class AdminController extends Controller
{

    public function index()
    {

        $serverRepository = new ServerRepository();
        $result = $serverRepository->getServerList();

        $view = new Template();
        $page = new Template();

        // view layout data
        $view->data['servers'] = $result;

        // page layout data
        $page->data['title'] = 'Servers - Server manager';
        $page->data['content'] = $view->getRender('templates/ServerList.php');

        // render
        echo $page->getRender('templates/Layout.php');
    }


    public function add()
    {
        $name = isset($_POST["servername"]) ? $_POST["servername"] : null;

        $serverRepository = new ServerRepository();
        $server = new Server();
        $server->setName($name);
        $serverRepository->addServer($server);

        header("Location: index.php");
    }

    public function remove()
    {
        $id = isset($_POST["id"]) ? $_POST["id"] : null;

        $serverRepository = new ServerRepository();
        $server = new Server();
        $server->setId($id);
        $serverRepository->removeServer($server);
        header("Location: index.php");
    }

    public function logout()
    {
        session_start();
        session_destroy();
        // Redirect to the login page:
        header("Location: index.php");
        exit;
    }
}
