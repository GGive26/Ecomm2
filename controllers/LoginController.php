<?php
include("C:/wamp64/www/Ecomm2/models/modelUtulisateur.php");


class LoginController
{
    private $model;
    public function __construct(modelUtulisateur $model)
    {
        $this->model = $model;
    }

    public function verifyUser($email, $password)
    {
        return $this->model->connecion($email, $password);
    }
    public function getUserID($email)
    {
        return $this->model->getUserId($email);
    }
    public function getUserName($email)
    {
        return $this->model->getUserName($email);
    }
    public function getPrenom($email)
    {
        return $this->model->getPrenom($email);
    }
    public function getPassword($email)
    {
        return $this->model->getPassword($email);
    }
    public function updateUser($nom, $prenom, $email, $password)
    {
        return $this->model->updateUser($nom, $prenom, $email, $password);
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
    $controller = new LoginController($model);




    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($_POST != null && empty($_POST['nomUpdate'])) {
        $utilisateurs = $controller->verifyUser($email, $password);
        if ($utilisateurs != false) {
            include("C:/wamp64/www/Ecomm2/views/Acceuil.php");
            $_SESSION['auth'] = [
                'role' =>  $controller->getUserID($email),
                'email' => $email,
                'nom' => $controller->getUserName($email),
                'prenom' => $controller->getPrenom($email),
                'password' => $controller->getPassword($email)
            ];
            var_dump($_SESSION['auth']['nom']);
        } else if ($_POST != null && $_POST['nomUpdate'] != null) {
            $nom = $_POST['nomUpdate'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userUpdate = $controller->updateUser($nom, $prenom, $email, $password);
            header("location:../views/Acceuil.php");
        } else {
            header("location:../views/Identification.php");
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
