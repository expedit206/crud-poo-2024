<?php
namespace models; 
require 'Database.class.php';
use Database;
class Product extends Database
{
    public function __construct()
    {
        parent::__construct();
     }

    public function index()
    {
      $sql = "SELECT * FROM produits";
      $result = $this->pdo->query($sql);

      
      $data = $result->fetchAll();
      return $data;
     }
    
    public function create($sql, $data)
    {
       try {
           $stmt = $this->pdo->prepare($sql);
           
           $result =$stmt->execute($data);
           if ($result) {
               echo 'Produit ajouté avec succès';
           } else {
               $errorInfo = $stmt->errorInfo();
               echo 'Erreur lors de l\'ajout du produit : ' . $errorInfo[2] . ' '. $errorInfo[1]; // Message d'erreur
           }
           return $result;
       } catch (PDOException $e) {
           echo 'Erreur de base de données : ' . $e->getMessage();
       }
     }

    public function insert()
    {
       try {
           $nom = htmlspecialchars($_POST['name']);
           $description = htmlspecialchars($_POST['description']);
           $prix = floatval($_POST['price']);
           $data = compact("nom", "description", "prix");
           $sql = "INSERT INTO produits VALUES (null, :nom, :description, :prix)";
         
        
           $stmt = $this->pdo->prepare($sql);
           
          return $stmt->execute($data);
          
       } catch (PDOException $e) {
           echo 'Erreur de base de données : ' . $e->getMessage();
       }
     }



      public function update($data)
      {
       $sql = "UPDATE produits SET nom = :nom, description = :description, prix = :prix WHERE id = :id";

       $result = $this->pdo->prepare($sql);
      return $stmt = $result->execute($data);
       }


       public function delete($id)
       {
           $sql = "DELETE from produits where id = $id";
        
          $this->pdo->query($sql);
        }

      public function find($id)
      {
       $sql = "SELECT * from produits where id = $id";

       $data = $this->pdo->query($sql);
       $data = $data->fetch();
       return $data;
       }
}