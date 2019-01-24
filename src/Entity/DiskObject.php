<?php

namespace App\Entity;

class DiskObject
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    private $name;
    private $createdAt;

    /**
     * DiskObject constructor.
     * @param $name
     * @param $createdAt
     */
    public function __construct($name, $createdAt)
    {
        $this->setName($name);
        $this->setCreatedAt($createdAt);
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getCreatedAt() : string
    {
        return $this->createdAt->format(self::DATE_FORMAT);
    }

    /**
     * @param $createdAt
     */
    public function setCreatedAt(string $createdAt) : void
    {
        $this->createdAt = new \DateTime($createdAt);
    }
}