<?php

    // Include the DirectoryLister class
    require_once('resources/DirectoryLister.php');

    // Initialize the DirectoryLister object
    $lister = new DirectoryLister();

    // Restrict access to current directory
    ini_set('open_basedir', getcwd());

    if (isset($_GET['zip'])) {

        $dirArray = $lister->zipDirectory($_GET['zip']);

    } else {

        // Initialize the directory array
        if (isset($_GET['dir'])) {
            $dirArray = $lister->listDirectory($_GET['dir']);
        } else {
            $dirArray = $lister->listDirectory('.');
        }

        // Define theme path
        if (!defined('THEMEPATH')) {
            define('THEMEPATH', $lister->getThemePath());
        }

        // Set path to theme index
        $themeIndex = $lister->getThemePath(true) . '/index.php';

        // Initialize the theme
        if (file_exists($themeIndex)) {
            include($themeIndex);
        } else {
            die('ERROR: Failed to initialize theme');
        }

    }
