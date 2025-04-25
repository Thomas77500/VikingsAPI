<?php
<<<<<<< HEAD
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/database.php';

function findOneViking(string $id) {
    $db = getDatabaseConnection();
    $sql = "SELECT id, name, health, attack, defense FROM viking WHERE id = :id";
    $stmt = $db->prepare($sql);
    $res = $stmt->execute(['id' => $id]);
    if ($res) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}

function findAllVikings (string $name = "", int $limit = 10, int $offset = 0) {
    $db = getDatabaseConnection();
    $params = [];
    $sql = "SELECT id, name, health, attack, defense FROM viking";
    if ($name) {
        $sql .= " WHERE name LIKE %:name%";
        $params['name'] = $name;
    }
    $sql .= " LIMIT $limit OFFSET $offset ";
    $stmt = $db->prepare($sql);
    $res = $stmt->execute($params);
    if ($res) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return null;
}

function createViking(string $name, int $health, int $attack, int $defense) {
    $db = getDatabaseConnection();
    $sql = "INSERT INTO viking (name, health, attack, defense) VALUES (:name, :health, :attack, :defense)";
    $stmt = $db->prepare($sql);
    $res = $stmt->execute(['name' => $name, 'health' => $health, 'attack' => $attack, 'defense' => $defense]);
    if ($res) {
        return $db->lastInsertId();
    }
    return null;
}

function updateViking(string $id, string $name, int $health, int $attack, int $defense) {
    $db = getDatabaseConnection();
    $sql = "UPDATE viking SET name = :name, health = :health, attack = :attack, defense = :defense WHERE id = :id";
    $stmt = $db->prepare($sql);
    $res = $stmt->execute(['id' => $id, 'name' => $name, 'health' => $health, 'attack' => $attack, 'defense' => $defense]);
    if ($res) {
        return $stmt->rowCount();
    }
    return null;
}

function deleteViking(string $id) {
    $db = getDatabaseConnection();
    $sql = "DELETE FROM viking WHERE id = :id";
    $stmt = $db->prepare($sql);
    $res = $stmt->execute(['id' => $id]);
    if ($res) {
        return $stmt->rowCount();
    }
    return null;
}
=======
require_once $_SERVER['DOCUMENT_ROOT'] .  '/api/utils/database.php';

function getVikingById(int $id) {
    try {
        $connection = getDatabaseConnection();
        $sql = "SELECT id, name, health, defense, attack FROM viking WHERE id = :id";
        $query = $connection->prepare($sql);
        $res = $query->execute(['id' => $id]);
        if ($res) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    } catch (Error $e) {
        return null;
    }
}

function findVikings(int $limit, int $offset) {
    try {
        $connection = getDatabaseConnection();
        $sql = "SELECT id, name, health, defense, attack FROM viking LIMIT $limit OFFSET $offset";
        $query = $connection->prepare($sql);
        $res = $query->execute();
        if ($res) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    } catch (Error $e) {
        return null;
    }
}

function createViking($name, $health, $defense, $attack) {
    try {
        $connection = getDatabaseConnection();
        $sql = "INSERT INTO viking (name, health, defense, attack) VALUES (:name, :health, :defense, :attack)";
        $query = $connection->prepare($sql);
        $res = $query->execute([
            'name' => $name,
            'health' => $health,
            'defense' => $defense,
            'attack' => $attack
        ]);
        if ($res) {
            return $connection->lastInsertId();
        }
        return null;
    } catch (Error $e) {
        echo $e->getMessage();
        return null;
    }
}

//
>>>>>>> de224af (Initial commit : API Vikings avec Weapon et Viking endpoints)
