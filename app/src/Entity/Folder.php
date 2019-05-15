<?php

namespace App\Entity;

class Folder extends DiskObject
{
    private $files      = [];
    private $folders    = [];

    /**
     * Folder constructor.
     * @param $name
     * @param $createdAt
     */
    public function __construct(string $name, \DateTime $createdAt)
    {
        parent::__construct($name, $createdAt);
    }

    /**
     * @return array
     */
    public function getFiles() : array
    {
        return $this->files;
    }

    /**
     * @param File $file
     */
    public function addFile(File $file) : void
    {
        $this->files[] = $file;
    }

    /**
     * @return array
     */
    public function getFolders(): array
    {
        return $this->folders;
    }

    /**
     * @param Folder $folder
     */
    public function addFolder(Folder $folder)
    {
        $this->folders[] = $folder;
    }
}
