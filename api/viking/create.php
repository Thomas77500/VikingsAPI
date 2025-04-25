<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';
<<<<<<< HEAD
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/viking/service.php';

header('Content-Type: application/json');

if (!methodIsAllowed('create')) {
    returnError(405, 'Method not allowed');
    return;
}

$data = getBody();

if (validateMandatoryParams($data, ['name', 'health', 'attack', 'defense'])) {
    verifyViking($data);

    $newVikingId = createViking($data['name'], $data['health'], $data['attack'], $data['defense']);
    if (!$newVikingId) {
        returnError(500, 'Could not create the viking');
    }
    echo json_encode(['id' => $newVikingId]);
    http_response_code(201);
} else {
    returnError(412, 'Mandatory parameters : name, health, attack, defense');
}
=======

header("Content-Type: application/json");
if (!methodIsAllowed('create')) {
    returnError('method not allowed', 405);
}

$data = getBody();
if (!$data) {
    returnError('body expected');
}
validateMandatoryParams($data, ['name', 'health', 'attack', 'defense']);

foreach (['attack', 'defense', 'health'] as $param) {
    validatePositiveInteger($data[$param], $param);
}
$attack = intval($data['attack']);
$defense = intval($data['defense']);
$health = intval($data['health']);

$name = $data['name'];
if (strlen($name) < 3 || strlen($name) > 36) {
    returnError('name has to between 3 and 36 char', 412);
}

$id = createViking($name, $health, $defense, $attack);
if (!$id) {
    returnError('an error has occurred', 500);
}
http_response_code(201);
echo json_encode(['id' => $id]);
>>>>>>> de224af (Initial commit : API Vikings avec Weapon et Viking endpoints)
