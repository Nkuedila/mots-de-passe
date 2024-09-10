<?php

require('db.php');


if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   


    $q = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name,:email, :password)");
    
    $q->bindValue(':name', $name);
    $q->bindValue(':email', $email);
    $q->bindValue(':password', $password);
    $user = $q->execute();
    

    if($user) {
        echo "INscription réussie";
    }



}

/*

-- my_database.users definition

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) ,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

*/