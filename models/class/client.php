<?php
class Client
{

    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private int $role_id;


    public function __construct($n, $p, $e, $ri, $pass)
    {
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $e;
        $this->role_id = $ri;
        $this->password = $pass;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setNom($newNom)
    {
        $this->nom = $newNom;
    }
    public function setPreom($newPrenom)
    {
        $this->nom = $newPrenom;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
    public function setAddress($password)
    {
        $this->password = $password;
    }
    public function getRole_id()
    {
        return $this->role_id;
    }
    public function setRole($newRole)
    {
        $this->role_id = $newRole;
    }
}
