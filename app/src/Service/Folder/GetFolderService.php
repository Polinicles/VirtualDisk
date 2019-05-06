<?php

namespace App\Service\Folder;

use App\Entity\Folder;

class GetFolderService
{
    private $breadcrumb = [];
    private $folder;

    /**
     * @return mixed
     */
    public function getFolder() : string
    {
        return serialize($this->folder);
    }

    /**
     * @param mixed $folder
     */
    public function setFolder($folder) : void
    {
        $this->folder = $folder;
    }

    /**
     * @return array
     */
    public function getBreadcrumb(): array
    {
        return $this->breadcrumb;
    }

    /**
     * @param int $position
     * @param array $breadcrumb
     */
    public function setBreadcrumb(int $position, array $breadcrumb) : void
    {
        $this->breadcrumb[$position] = $breadcrumb;
    }

    /**
     * Initiate the recursive call
     *
     */
    public function execute() : void
    {
        $count = 0; // Used to define the breadcrumb array's position
        $this->findFolder($_SESSION['disk'], $count);
    }

    /**
     * Recursive call to find the selected folder and define the breadcrumb
     *
     * @param Folder $selectedFolder
     * @param int $count
     */
    public function findFolder(Folder $selectedFolder, $count)
    {
        // Base case: if name of the folder matches the session's selected folder, exit
        if ($selectedFolder->getName() == $_SESSION['selectedFolder']) {
            $this->setBreadcrumb($count, [
                $selectedFolder->getName(),
                $selectedFolder->getCreatedAt()
            ]);
            $count = null; // Set counter to exit the foreach loop
            $this->setFolder($selectedFolder); // Define the right folder
            return; // Exit the recursion
        }

        // Define the next breadcrumb level
        $this->setBreadcrumb($count, [
            $selectedFolder->getName(),
            $selectedFolder->getCreatedAt()
        ]);

        // If a folder has subfolders, run the recursive func through every inner folder
        $innerFolders = $selectedFolder->getFolders();

        if(count($innerFolders) > 0) {
            $count++;
            /* @var \App\Entity\Folder $innerFolder */
            foreach ($innerFolders as $innerFolder) {
                // Only will run if we haven't find the folder
                if(!is_null($count)) {
                    $this->findFolder($innerFolder, $count);
                }
            }
        }
    }
}