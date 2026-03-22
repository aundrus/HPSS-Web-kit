<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once __DIR__ . '/includes/PageController.php';

$controller = new PageController(
    title: 'RACF HPSS Admin Group',
    contentFile: __DIR__ . '/RACF.php',
    showDoeLogo: true  // Enable DOE logo
);

$controller->render();
