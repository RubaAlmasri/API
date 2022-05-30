<?php

$db = new PDO("mysql:host=localhost;dbname=api", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try {
    $id=$_POST['id'];
    $name=$_POST['name'];
    // $email=$_POST['email'];
    $address=$_POST['address'];
    
    $sql = ('UPDATE users SET address=:address WHERE id=:ID and name=:name');

    $statement = $db->prepare($sql);

    $statement->bindValue(':address', $address);
    // $statement->bindValue(':email', $email);
    $statement->bindValue(':ID', $id);
    $statement->bindValue(':name', $name);

    $statement->execute();

    $result = ['Data updated successfully...'];
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    $result = ['ERROR!!!'];
} finally {
    $db = null;
}
echo json_encode($result);
