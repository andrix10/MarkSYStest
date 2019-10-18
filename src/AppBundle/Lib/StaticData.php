<?php

namespace AppBundle\Lib;

class StaticData
{
    public static function getSampleHeader()
    {
        return [
            1  => 'header 1',
            2  => 'header 2',
            3  => 'header 3',
            4  => 'header 4',
            5  => 'header 5',
            6  => 'header 6',
            7  => 'header 7',
            8  => 'header 8',
            9  => 'header 9',
            10 => 'header 10',
        ];
    }

    public static function getSampleRow()
    {
        return [
            1  => 'cell value here',
            2  => 'cell value here',
            3  => 'cell value here',
            4  => 'cell value here',
            5  => 'cell value here',
            6  => 'cell value here',
            7  => 'cell value here',
            8  => 'cell value here',
            9  => 'cell value here',
            10 => 'cell value here',
        ];
    }
}