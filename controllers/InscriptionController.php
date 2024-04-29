<?php
include("C:/wamp64/www/Ecomm2/models/modelUtulisateur.php");

class UserController
{
    private $model;
    public function __construct(modelUtulisateur $model)
    {
        $this->model = $model;
    }

    public function addUsers(Client $client)
    {
        return $this->model->addUsers($client);
    }
}
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


    $model1 = new modelUtulisateur($dbco);
    $controller1 = new LoginController($model1);


    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    $user = new Client($nom, $prenom, $email, 0, $password);


    if ($_POST != null) {
        if ($utilisateurs = $controller1->verifyUser($email, $password) == false) {
            $utilisateurs = $controller->addUsers($user);


            include("C:/wamp64/www/Ecomm2/views/Acceuil.php");

            $_SESSION['login'] = [
                'role' =>  0,
                'email' => $email,
                'nom' => $nom,
                'prenom' => $prenom,
                'password' => $password
            ];
        } else {
            header("location:../views/inscription.php");
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
