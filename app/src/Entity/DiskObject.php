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
        $this->name = $name;
        $this->createdAt = $createdAt; //TODO: pass a Value Object
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function createdAt(): string
    {
        return $this->createdAt->format(self::DATE_FORMAT);
    }
}
