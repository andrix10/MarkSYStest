<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="csv_cell")
 * @UniqueEntity(fields={"csvFile", "col","row"}, message="This cell is has already been added.")
 */
class CsvCell
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
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $row;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $col;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $value;

    /**
     * @var CsvFile
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CsvFile", inversedBy="cells")
     * @ORM\JoinColumn(name="csv_file_id", referencedColumnName="id")
     */
    protected $csvFile;

    /**
     * @param $row int
     * @param $col int
     * @param $value string
     * @return CsvCell
     */
    public static function createCell($row, $col, $value)
    {
        $cell = new self();
        $cell
            ->setRow($row)
            ->setCol($col)
            ->setValue($value);

        return $cell;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param int $row
     * @return CsvCell
     */
    public function setRow($row)
    {
        $this->row = $row;

        return $this;
    }

    /**
     * @return int
     */
    public function getCol()
    {
        return $this->col;
    }

    /**
     * @param int $col
     * @return CsvCell
     */
    public function setCol($col)
    {
        $this->col = $col;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return CsvCell
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return CsvFile
     */
    public function getCsvFile()
    {
        return $this->csvFile;
    }

    /**
     * @param CsvFile $csvFile
     * @return CsvCell
     */
    public function setCsvFile($csvFile)
    {
        $this->csvFile = $csvFile;

        return $this;
    }
}