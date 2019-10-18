<?php

namespace AppBundle\Repository;

use AppBundle\Entity\CsvCell;
use AppBundle\Entity\CsvFile;
use Doctrine\ORM\EntityRepository;

class CsvFileRepository extends EntityRepository
{
    public function getFile($uuid)
    {
        /** @var CsvFile $csvFile */
        $csvFile = $this->findFile($uuid);
        $csvFile->setHeaderRow();
        $csvFile->setCellRows();

        return $csvFile;
    }

    public function findFile($uuid)
    {
        $dql = "SELECT csv ";
        $dql .= "FROM " . CsvFile::class . " csv ";
        $dql .= "WHERE csv.uuid = :uuid";

        $em = $this->getEntityManager();
        $query = $em->createQuery($dql);
        $query->setParameter('uuid', $uuid);

        $result = $query->getResult();

        if ($result) {
            return $result[0];
        }

        return null;
    }
}