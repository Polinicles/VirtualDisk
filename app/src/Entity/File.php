<?php

namespace App\Entity;

class File extends DiskObject
{
    /**
     * File constructor.
     * @param $name
     * @param $createdAt
     */
    public function __construct(string $name, \DateTime $createdAt)
    {
        parent::__construct($name, $createdAt);
    }
}
