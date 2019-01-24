<?php

namespace App\Controller;

use App\Service\Folder\GetFolderService;
use App\Service\View\View;

require __DIR__.'/../../config/app.php';

class FolderController
{
    /**
     * @var GetFolderService
     */
    private $getFolderService;

    /**
     * FolderController constructor.
     */
    public function __construct()
    {
        $this->getFolderService = new GetFolderService();
    }

    /**
     * Show the selected folder
     */
    public function get()
    {
        // If defined in the view, assign the selected folder
        if(isset($_GET['selectedFolder'])) {
            $_SESSION['selectedFolder'] = $_GET['selectedFolder'];
        }

        // Get and define the folder and breadcrumb
        $this->getFolderService->execute();

        $_SESSION['breadcrumb'] = $this->getFolderService->getBreadcrumb();
        $_SESSION['result']     = $this->getFolderService->getFolder();

        // Return the home view
        $view = new View(TEMPLATES_PATH.'home.php');
        $view->render([]);

    }
}