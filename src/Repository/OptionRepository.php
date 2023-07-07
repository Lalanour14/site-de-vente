<?php
namespace App\Repository;

use App\entity\Option;


class OptionRepository
{
/**
   
     * @return Option[] 
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM option");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Option($line["label"], $line["price"]);
        }

        return $list;
    }
   
    public function findById(int $id):?Option {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM option WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Option($line["label"], $line["price"], $line["id"]);
        }
        return null;

    }
   

    



     public function persist(Option $option) {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO option (label,price) VALUES (:label,:price)");
        $query->bindValue(':label', $option->getLabel());
        $query->bindValue(':price', $option->getPrice());
       
        

        $query->execute();

        $option->setId($connection->lastInsertId());
    }

   
    public function delete(int $id) {

        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM option WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

 
    public function update(Option $option) {
        
        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE option SET label=:label, price=:price WHERE id=:id");
        $query->bindValue(':label', $option->getLabel());
        $query->bindValue(':price', $option->getPrice());
       
        $query->bindValue(":id", $option->getId());

        $query->execute();
    }
    
}