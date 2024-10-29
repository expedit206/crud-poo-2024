<?php
class Database
{ 
    
    protected $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=crud-poo', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active le mode d'erreur
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
        // return $this->pdo;
     }

}