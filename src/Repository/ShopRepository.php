<?php
namespace App\Repository;

use App\entity\Shop;


class ShopRepository
{
/**
   
     * @return Shop[] 
     */
    public function findAll(): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM shop");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Shop($line["name"],$line["address"], $line["id"]);
        }

        return $list;
    }
  
    public function findById(int $id):?Shop {

        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM shop WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Shop($line["name"], $line["address"], $line["id"]);
        }
        return null;

    }

    /**

     * @param $id 
     */



     public function persist(Shop $shop) {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO shop (name,address,id) VALUES (:name,:address,:id)");
        $query->bindValue(':name', $shop->getName());
        $query->bindValue(':address', $shop->getAddress());
        $query->bindValue(':id', $shop->getID());
        
        

        $query->execute();

        $shop->setId($connection->lastInsertId());
    }

    /**
   
     * @param $id 
     */
    public function delete(int $id) {

        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM shop WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

  
    public function update(Shop $shop) {
        
        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE shop SET name=:name, address=:address WHERE id=:id");
        $query->bindValue(':name', $shop->getName());
        $query->bindValue(':address', $shop->getAddress());
        
        $query->bindValue(":id", $shop->getId());

        $query->execute();
    }
    
}