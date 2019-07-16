<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

// Get all goods

$app->get('/api/goods/all', function(Request $request, Response $response, array $args) {
    $sql = "SELECT * FROM goods";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $goods = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($goods);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

$app->get('/api/goods/{id}', function(Request $request, Response $response, array $args) {

    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM goods WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $good = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($good);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});