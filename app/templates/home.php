<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>A Web Page</title>
</head>

<body>

<div style="margin: 20px 0 50px 65px;">
    <?php

        $parentFolderName   = null;
        $parentCreatedAt    = null;
        $url                = "http://localhost:8080?selectedFolder=";

        // Display the breadcrumb
        foreach ($_SESSION['breadcrumb'] as $key => $instance) {
            for($i = 0; $i < count($instance)-1; $i++) {
                // For the last & current folder
                if(count($_SESSION['breadcrumb'])-1 == $key) {
                    echo $_SESSION['breadcrumb'][$key][$i];
                    // If it's not the root folderectory, save the parent folderectory's name and date for the folders list
                    if(count($_SESSION['breadcrumb']) > 1) {
                        $parentFolderName   = $_SESSION['breadcrumb'][$key-1][$i];
                        $parentCreatedAt    = $_SESSION['breadcrumb'][$key-1][$i+1];
                    }
                } else {
                    echo '<a href="'.$url. $_SESSION['breadcrumb'][$key][$i].'"'. '>'.$_SESSION['breadcrumb'][$key][$i].'</a>'.' > ';
                }
            }
        }
    ?>
</div>

<table style="width:500px;margin-left: 20px;border: 1px solid black;">
    <tr>
        <th>Name</th>
        <th>Created</th>
        <th>Folderectory</th>
    </tr>
    <?php

        /* Define variables we'll use */
        $diskObjects    = [];
        $folder         = unserialize($_SESSION['result']);
        $checked        = '<input type="checkbox" name="folder" checked disabled="disabled">';
        $notChecked     = '<input type="checkbox" name="folder" disabled="disabled">';
        array_push($diskObjects, $folder->getFolders());
        array_push($diskObjects, $folder->getFiles());

        /* Add parent and current folder links */
        if(count($_SESSION['breadcrumb']) > 1) {
            echo '<tr>';
            echo '<th><a href="'.$url. $folder->getName().'"'.'>.</a></th>';
            echo '<th><span>'.$folder->getCreatedAt().'</span></th>';
            echo '<th>'.$checked.'</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<th><a href="'.$url. $parentFolderName.'"'.'>..</a></th>';
            echo '<th><span>'.$parentCreatedAt.'</span></th>';
            echo '<th>'.$checked.'</th>';
            echo '</tr>';
        } else {
            echo '<tr>';
            echo '<th><a href="'.$url. $folder->getName().'"'.'>.</a></th>';
            echo '<th><span>'.$folder->getCreatedAt().'</span></th>';
            echo '<th>'.$checked.'</th>';
            echo '</tr>';
        }

        /**
         * Get folders
         * @var \App\Entity\Folder $folder
         */
        foreach ($folder->getFolders() as $folder) {
            echo '<tr>';
            echo '<th><a href="'.$url. $folder->getName().'"'. '>'.$folder->getName().'</a></th>';
            echo '<th><span>'.$folder->getCreatedAt().'</span></th>';
            echo '<th>'.$checked.'</th>';
            echo '</tr>';
        }

        /**
         * Get files
         * @var \App\Entity\File $file
         */
        foreach ($folder->getFiles() as $file) {
            echo '<tr>';
            echo '<th><span>'.$file->getName().'</span></th>';
            echo '<th><span>'.$file->getCreatedAt().'</span></th>';
            echo '<th>'.$notChecked.'</th>';
            echo '</tr>';
        }
    ?>
</table>
</body>