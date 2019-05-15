<?php

namespace App\Entity;

class DiskObject
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /** @var string */
    private $name;

    /** @var \DateTime */
    private $createdAt;

    /**
     * DiskObject constructor.
     * @param $name
     * @param $createdAt
     */
    public function __construct(string $name, \DateTime $createdAt)
    {
        $this->name = $name;
        $this->createdAt = $createdAt;
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
        return $this->createdAt;
    }
}
