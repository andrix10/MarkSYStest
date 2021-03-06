<?php

namespace AppBundle\Entity;

use AppBundle\Lib\StaticData;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CsvFileRepository")
 * @ORM\Table(name="csv_file")
 */
class CsvFile
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $uuid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $uploadDate;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CsvCell", mappedBy="csvFile", cascade={"persist"})
     */
    protected $cells;

    protected $headerRow;

    protected $cellRows;

    public function __construct()
    {
        try {
            $this->uuid = Uuid::uuid4()->toString();
        } catch (UnsatisfiedDependencyException $exception) {
            throw new \RuntimeException($exception->getMessage());
        }
        $this->uploadDate = new \DateTime('now');
        $this->cells      = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CsvFile
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * @param \DateTime $uploadDate
     * @return CsvFile
     */
    public function setUploadDate($uploadDate)
    {
        $this->uploadDate = $uploadDate;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCells()
    {
        return $this->cells;
    }

    /**
     * @param CsvCell $cell
     */
    public function addCell(CsvCell $cell)
    {
        $this->cells->add($cell);
        $cell->setCsvFile($this);
    }

    public function setHeaderRow()
    {
        $header = $this->cells->current();
        $result = [];

        while($header->getRow() == 1){
            $result[] = CsvCell::createCell(1, 0, $header->getValue() );
            $header = $this->cells->next();
        }

        $this->headerRow = $result;

    }

    public function getHeaderRow()
    {
        return $this->headerRow;
    }

    public function getCellRows()
    {
        return $this->cellRows;
    }

    public function setCellRows()
    {   
        $skipCell = $this->cells;
        $skipCell->first();
        $rows = [];
        $rows2 = [];
        $count = 0;
        $count2 = 0;
        $rowCount = 2;

        foreach($skipCell as $current){
            if($current->getRow() == $rowCount){
                $rows[$count++] = $current->getValue();
            }
            else if($current->getRow() > $rowCount){
                $rows2[$count2++] = $rows;
                $rows = [];
                $rowCount++;
                $count = 0;
                $rows[$count++] = $current->getValue();
            }
        }

        $this->cellRows = $rows2;
        
    }
}