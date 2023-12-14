<?php

require_once 'C:\xampp\htdocs\projet\projetweb\back office\config.php';

class eventC
{

    public function listeevent()
    {
        $sql = "SELECT * FROM evenement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteevent($idEvenement)
    {
        $sql = "DELETE FROM evenement WHERE idEvenement = :idEvenement";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idEvenement', $idEvenement);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addevent($event)
    {
        $sql = "INSERT INTO evenement  
        VALUES (:idEvenement, :nom, :description, ;image, :date, :heure, :lieu)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idEvenement', $event->getidEvenement());
            $query->bindValue(':nom', $event->getnom());
            $query->bindValue(':description', $event->getdescription());
            $query->bindValue(':image', $event->getimage());
            
            // Convert the date to a timestamp (assuming $event->getdate() is a valid date string)
            $query->bindValue(':date', $event->getdate()->format('Y-m-d H:i:s'));

           
    
            $query->bindValue(':heure', $event->getheure());
            $query->bindValue(':lieu', $event->getlieu());
    
            $query->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    




    function showevent($idEvenement)
    {
        $sql = "SELECT * from evenement where idEvenement = $idEvenement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateevent($evenement, $idEvenement)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement SET 
                    idEvenement = :idEvenement, 
                    nom = :nom, 
                    description= :description,
                    image= :image, 
                    date= :date,
                    heure= :heure,
                    lieu= :lieu
                WHERE idEvenement= :idEvenement'
            );
            
            $query->execute([
                'idEvenement' => $idEvenement,
                'nom' => $evenement->getNom(),
                'description' => $evenement->getdescription(),
                'image' => $evenement->getimage(),
                'date' => $evenement->getdate(),
                'heure' => $evenement->getheure(),
                'lieu' => $evenement->getlieu(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function searchEventByName($name)
    {
        $sql = "SELECT * FROM evenement WHERE nom LIKE :name";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
