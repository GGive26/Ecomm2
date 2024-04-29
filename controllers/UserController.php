<?php

include("C:/wamp64/www/Ecomm2/models/modelUtulisateur.php");


class UserController
{
    private $model;
    public function __construct(modelUtulisateur $model)
    {
        $this->model = $model;
    }

    public function updateUser(Client $client)
    {
        return $this->model->updateUser($client);
    }
}
$servername = "localhost";
$dbname = "projet-ecom2";
$user = "root";
$pass = "";
try {
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $model = new modelUtulisateur($dbco);
    $controller = new UserController($model);

    $email = $_POST['emailUpdate'];
    $password = $_POST['passwordUpdate'];
    $nom = $_POST['nomUpdate'];
    $prenom = $_POST['prenomUpdate'];

    $client = new Client($nom, $prenom, $email, 0, $password);

    if ($_POST != null) {
        $utilisateurs = $controller->updateUser($client);
        header("location:../views/Acceuil.php");
    }
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
