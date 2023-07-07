<?php
namespace App\Repository;

use App\entity\Fleur;


class FleurRepository
{

    /**
     * Récupère tous les cours
     * @return Fleur[]
     */
    public function findAll(): array
    {

        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM fleur");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Fleur(
                $line['label'], $line['basePrice'], $line['description'], $line['picture'], $line['id']
            );
        }
        return $list;
    }
    public function findByOption(int $id): array
    {
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM option
         LEFT JOIN fleur_option ON option.id = fleur_option.id_option WHERE fleur_option.id_fleur = :id");
        $query->bindValue(':id', $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Fleur(
                $line['label'], $line['basePrice'], $line['description'], $line['picture'], $line['id']
            );
        }

        return $list;
    }

    public function findById(int $id): ?Fleur
    {
        $connection = Database::getConnection();
        $query = $connection->prepare("SELECT * FROM fleur WHERE id = :id");
        $query->bindValue(":id", $id);
        $query->execute();

        $line = $query->fetch();

        if ($line) {
            return new Fleur(
                $line['label'], $line['basePrice'], $line['description'], $line['picture'], $line['id']
            );
        }

        return null;
    }

    public function persist(Fleur $fleur) {
        $connection = Database::getConnection();
        $query = $connection->prepare("INSERT INTO fleur (label, basePrice, description, picture) VALUES (:label, :basePrice, :description, :picture)");
    
        $query->bindValue(':label', $fleur->getLabel());
        $query->bindValue(':basePrice', $fleur->getBasePrice());
        $query->bindValue(':description', $fleur->getDescription());
        $query->bindValue(':picture', $fleur->getPicture());
    
        $query->execute();
    }
    

}