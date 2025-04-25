<?php

function methodIsAllowed(string $action): bool {
    $method = $_SERVER['REQUEST_METHOD'];
    switch ($action) {
        case 'update':
        case 'create':
            return $method == 'PUT';
        case 'read':
            return $method == 'GET';
        case 'delete':
            return $method == 'DELETE';
        default:
            return false;
    }
}

<<<<<<< HEAD
function getBody(): array {
    $body = file_get_contents('php://input');
    return json_decode($body, true);
}

function returnError (int $code, string $message) {
    http_response_code($code);
    echo json_encode(['error' => $message]);
    exit();
}

function validateMandatoryParams(array $data, array $mandatoryParams): bool {
    foreach ($mandatoryParams as $param) {
        if (!isset($data[$param])) {
            return false;
=======

function returnError($message, $code = 400) {
    echo json_encode(["error" => $message]);
    http_response_code($code);
    exit();
}

function getBody() {
    return json_decode(
        file_get_contents("php://input"), true
    );
}

function validatePositiveInteger($value, $paramName) {
    $int = intval($value);
    if ($int <= 0) {
        returnError("$paramName can't be negative or null", 412);
    }
    return $int;
}

function validateMandatoryParams (array $data, array $mandatoryParams) {
    foreach ($mandatoryParams as $param) {
        if (empty($data[$param])) {
            returnError("$param is mandatory", 412);
>>>>>>> de224af (Initial commit : API Vikings avec Weapon et Viking endpoints)
        }
    }
    return true;
}