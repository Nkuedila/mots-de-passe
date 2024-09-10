<?php 



require('db.php');

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];



   
    $q = $db->prepare('SELECT * FROM users WHERE name = :name OR email = :email');
    $q->bindValue(':email', $email);
    $q->bindValue(':name', $name);
    $q->execute(); 

    $user = $q->fetch(PDO::FETCH_ASSOC);



    if ($user) {
        $passwordHash = $user['password'];
        if (password_verify($password, $passwordHash)) {
            echo "Connexion réussie";
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Utilisateur non trouvé";
    }
} else {
    echo "Veuillez remplir tous les champs";
}
?>