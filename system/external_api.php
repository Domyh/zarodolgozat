<?php
require 'includes.php';

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if (isset($_GET['getSearchResults']))
    {
        global $db;
        $sql = 'select id, name, description from parts where parent_model = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['model']]);
		$ret = $stmt->fetchAll();
        echo json_encode($ret);
    }
    elseif (isset($_GET['removeBrand']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'delete from brand where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['brand']]);
        echo "OK";
    }
    elseif (isset($_GET['addBrand']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'insert into brand set name = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['name']]);
        echo "OK";
    }
    elseif (isset($_GET['modifyBrand']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'update brand set name = ? where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['name'], $_GET['id']]);
        echo "OK";
    }
    elseif (isset($_GET['removeModel']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'delete from model where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['model']]);
        echo "OK";
    }
    elseif (isset($_GET['addModel']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'insert into model set name = ?, parent_brand = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['name'], $_GET['parentbrand']]);
        echo "OK";
    }
    elseif (isset($_GET['modifyModel']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'update model set name = ?, parent_brand = ? where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['name'], $_GET['parentbrand'], $_GET['id']]);
        echo "OK";
    }
    elseif (isset($_GET['addPart']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'insert into parts set name = ?, parent_model = ?, description = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['name'], $_GET['parentmodel'], $_GET['description']]);
        echo "OK";
    }
    elseif (isset($_GET['removePart']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'delete from parts where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['id']]);
        echo "OK";
    }
    elseif (isset($_GET['modifyPart']))
    {
        if (!$_SESSION || (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true))
        {
            echo 'UNAUTHORIZED';
            return;
        }

        global $db;
        $sql = 'update parts set name = ?, parent_model = ?, description = ? where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$_GET['name'], $_GET['parentmodel'], $_GET['description'], $_GET['id']]);
        echo "OK";
    }
}