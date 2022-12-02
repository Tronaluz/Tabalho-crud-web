<?php 
require $_SERVER["DOCUMENT_ROOT"] . "/http/controllers/userController.php";

function routeManager($request, $db) {
    $userController = new UserController($db);
    switch ($request) {
        case '/' :
            break;
        case '/users/index':
            $response = $userController->index();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            break;
        case '/users/create':
            $response = $userController->store();
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            break;
        case '/users/delete':
            $response = $userController->delete();
            header('content-type: application/json; charset=utf-8');
            echo json_encode($response);
            break;
        default:
            break;
    }
}
?>