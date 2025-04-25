<?php
<<<<<<< HEAD
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';

header('Content-Type: application/json');

if (!methodIsAllowed('read')) {
    returnError(405, 'Method not allowed');
    return;
}

$name = '';
$limit = 10;
$offset = 0;
if (isset($_GET['name'])) {
    $name = trim($_GET['name']);
}
if (isset($_GET['limit'])) {
    $limit = intval($_GET['limit']);
    if ($limit < 1) {
        returnError(400, 'Limit must be a positive and non zero number');
    }
}
if (isset($_GET['offset'])) {
    $offset = intval($_GET['offset']);
    if ($offset < 0) {
        returnError(400, 'Offset must be a positive number');
    }
}

$vikings = findAllVikings($name, $limit, $offset);
echo json_encode($vikings);
=======
require_once $_SERVER['DOCUMENT_ROOT'] .  '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] .  '/api/utils/server.php';

http_response_code(200);
header("Content-Type: application/json");

if (!methodIsAllowed('read')) {
    returnError('method not allowed', 405);
}
$limit = 10;
$offset = 0;

$limit = validatePositiveInteger($_GET['limit'], 'limit');

if (!empty($_GET['offset'])) {
    $offset = intval($_GET['offset']);
    if ($offset < 0) {
        returnError("Offset can't be negative");
    }
}

$vikings = findVikings($limit, $offset);
if ($vikings != null) {
    echo json_encode($vikings);
} else {
    echo json_encode(['error' => "An error has occurred."]);
    http_response_code(500);
    die();
}


/*

NIV 0
Requête : POST http://apivikings.com/api/v1/index.php
{
'method': 'read',
'resource': 'viking',
'id': 1
}

Réponse :
{
    "id": 1,
    "name": "Ragnar",
    "health": 300,
    "attack": 160,
    "defense": 100,
    "weapon": 3
}


NIV 1
Requête : POST http://apivikings.com/api/v1/viking.php?id=1
{
'method': 'read',
}

Réponse :
{
    "id": 1,
    "name": "Ragnar",
    "health": 300,
    "attack": 160,
    "defense": 100,
    "weapon": 3
}

NIV 2
Requête : GET http://apivikings.com/api/v1/viking.php?id=1

Réponse :
{
    "id": 1,
    "name": "Ragnar",
    "health": 300,
    "attack": 160,
    "defense": 100,
    "weapon": 3
}


NIV 3
Requête : GET http://apivikings.com/api/v1/viking?id=1

Réponse :
{
    "id": 1,
    "name": "Ragnar",
    "health": 300,
    "attack": 160,
    "defense": 100,
    "weapon": {
        "id": 3,
        "link": "http://apivikings.com/api/v1/weapon?id=3"
    }
}



 *
 *
 *
 */













>>>>>>> de224af (Initial commit : API Vikings avec Weapon et Viking endpoints)
