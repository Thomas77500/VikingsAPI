<?php
require_once $_SERVER['DOCUMENT_ROOT'] .  '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] .  '/api/utils/server.php';

http_response_code(200);
header("Content-Type: application/json");

if (!methodIsAllowed('read')) {
    returnError('method not allowed', 405);
}

if (empty($_GET['id'])) {
    returnError("id can't be empty");
}
$id = validatePositiveInteger($_GET['id']);

$viking = getVikingById($id);

if ($viking) {
    echo json_encode($viking);
} else {
    returnError("viking not found", 404);
}