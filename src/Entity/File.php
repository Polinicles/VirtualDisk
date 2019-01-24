<?php

namespace App\Entity;

class File extends DiskObject
{
    /**
     * File constructor.
     * @param $name
     * @param $createdAt
     */
    public function __construct($name, $createdAt)
    {
        parent::__construct($name, $createdAt);
    }
}