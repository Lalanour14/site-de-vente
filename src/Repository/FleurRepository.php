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
                $line['name'], $line['basePrice'], $line['description'], $line['id']
            );
        }
        return $list;
    }
}