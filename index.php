<?php
<<<<<<< HEAD
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/database.php';

try {
    $db = getDatabaseConnection();
    echo "Hello dear Viking!";
} catch (PDOException $e) {
    echo "Could not connect to the database. " . $e->getMessage();
}
=======
>>>>>>> de224af (Initial commit : API Vikings avec Weapon et Viking endpoints)
