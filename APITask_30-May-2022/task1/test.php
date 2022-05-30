<?php

$db = new PDO("mysql:host=localhost;dbname=api", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try {
    $sql = ('INSERT INTO users (name,email,address)
    VALUES ("ali", "ali@gmail.com", "irbid")');

    $statement = $db->prepare($sql);
    $statement->execute();
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    $db = null;
}
