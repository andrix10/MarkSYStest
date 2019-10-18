<?php

namespace AppBundle\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class CsvUploadModel
{
    /**
     * @var UploadedFile
     */
    protected $file;

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }
}