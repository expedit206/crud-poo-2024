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
     }

     public function index()
     {

       $sql = "SELECT * FROM produits";
       $result = $this->pdo->query($sql);

       
       $data = $result->fetchAll();
       if($data){
           echo 'affichage du produit';
       }
       return $data;
      }
     
     public function insert($sql, $data)
     {
        try {
            // Préparer la requête
            var_dump($this->pdo);
            $stmt = $this->pdo->prepare($sql);
            
            $result =$stmt->execute($data);
            // Exécuter la requête avec les données
            if ($result) {
                echo 'Produit ajouté avec succès';
            } else {
                // Si l'exécution échoue, vous pouvez obtenir les erreurs
                $errorInfo = $stmt->errorInfo();
                echo 'Erreur lors de l\'ajout du produit : ' . $errorInfo[2] . ' '. $errorInfo[1]; // Message d'erreur
            }
            return $result;
        } catch (PDOException $e) {
            // Gérer les exceptions PDO
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

            return $this->pdo->query($sql);
         }
       public function find($id)
       {
        $sql = "SELECT * from produits where id = $id";

        $data = $this->pdo->query($sql);
        $data = $data->fetch();
        return $data;
        }
}