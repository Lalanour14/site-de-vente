<?php
namespace App\Repository;

use App\Entity\Fleur;


class FleurRepository
{
/**
   
     * @return Fleur[] 
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM fleur");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Fleur($line["label"],$line["basePrice"],$line["description"],$line["picture"], $line["id"]);
        }

        return $list;
    }
    /**
     * @return Fleur[]
     */
    public function findById(int $id):?Fleur {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM fleur WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Fleur($line["label"], $line["basePrice"],$line['description'],$line['picture'], $line["id"]);
        }
        return null;

    }

    /**

     * @param $id 
     */



     public function persist(Fleur $fleur) {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO fleur (label,basePrice,description,picture) VALUES (:label,:basePrice,:description,:picture)");
        $query->bindValue(':label', $fleur->getLabel());
        $query->bindValue(':basePrice', $fleur->getBasePrice());
        $query->bindValue(':description', $fleur->getDescription());
        $query->bindValue(':picture', $fleur->getPicture());
        

        $query->execute();

        $fleur->setId($connection->lastInsertId());
    }

    /**
   
     * @param $id 
     */
    public function delete(int $id) {

        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM fleur WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    /**
     * 
     * 
     * @param Fleur $fleur 
     */
    public function update(Fleur $fleur) {
        
        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE fleur SET label=:label, basePrice=:basePrice, description=:description, picture=:picture WHERE id=:id");
        $query->bindValue(':label', $fleur->getLabel());
        $query->bindValue(':basePrice', $fleur->getBasePrice());
        $query->bindValue(':description', $fleur->getDescription());
        $query->bindValue(':picture', $fleur->getPicture());
        $query->bindValue(":id", $fleur->getId());

        $query->execute();
    }
    
}