<?php
declare(strict_types=1);

/**
 * Base controller for HPSS monitoring pages
 */
class PageController 
{
    public function __construct(
        private string $title,
        private string $contentFile,
        private int $refreshInterval = 60,
        private bool $showDoeLogo = false  // Add this parameter
    ) {}

    public function render(): void 
    {
        $refresh = getRefreshInterval($this->refreshInterval);
        $title = $this->title;
        
        // Include refresh meta if needed
        if ($refresh > 0) {
            include __DIR__ . '/../templates/frame0.php';
        }

        // Render with or without frames
        if (!isFrameDisabled()) {
            include __DIR__ . '/../templates/frame1.php';
        }

        // Main content
        include $this->contentFile;

        // Footer
        if (!isFrameDisabled()) {
            $showDoeLogo = $this->showDoeLogo;  // Pass to frame2.php
            include __DIR__ . '/../templates/frame2.php';
        }
    }
}