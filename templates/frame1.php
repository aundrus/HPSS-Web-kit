<?php
declare(strict_types=1);
/**
 * Page header template - PHP 8.2 compatible
 * @var string $title Page title
 * @var int $refresh Refresh interval
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    
    <title><?= h($title) ?></title>
    
    <link rel="stylesheet" href="css/generic_print.css" media="print">
    <link rel="stylesheet" href="css/generic_style.css">
    <link rel="stylesheet" href="css/home_styles.css">
    
    <script>
    // Popup window function
    function popWin(url) {
        const width = 520;
        const height = 400;
        const left = (screen.width - width) / 2;
        const top = (screen.height - height) / 2;
        
        window.open(url, '_blank', 
            `toolbar=no,scrollbars=yes,location=no,status=no,menubar=no,resizable=yes,width=${width},height=${height},left=${left},top=${top}`
        );
    }
    
    // Jump box navigation
    function jumpBox(list) {
        location.href = list.options[list.selectedIndex].value;
    }
    
    // Prevent framing
    if (top.location !== self.location) {
        top.location = self.location;
    }
    
    // Text counter for textareas
    function textCounter(field, countField, maxLimit) {
        if (field.value.length > maxLimit) {
            field.value = field.value.substring(0, maxLimit);
        }
        countField.value = maxLimit - field.value.length;
    }
    
    // Image popup window
    function openPictureWindow(imageName, imageWidth, imageHeight, alt, posLeft, posTop) {
        const newWindow = window.open('', 'newWindow', 
            `width=${imageWidth},height=${imageHeight},left=${posLeft},top=${posTop}`
        );
        newWindow.document.open();
        newWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head><title>${alt}</title></head>
            <body style="margin:0;padding:0;" onblur="self.close()">
                <img src="${imageName}" width="${imageWidth}" height="${imageHeight}" alt="${alt}">
            </body>
            </html>
        `);
        newWindow.document.close();
        newWindow.focus();
    }
    
    // Contact popup
    function contactPopup() {
        window.open('contactpopup.asp', 'poppage', 
            'toolbar=no,scrollbars=yes,location=no,status=no,menubar=no,resizable=no,width=450,height=270'
        );
    }
    
    // Custom popup
    function customPopup(url, options = {}) {
        const defaults = {
            toolbar: 0, scrollbars: 1, location: 0, 
            status: 0, menubar: 0, resizable: 1,
            width: 600, height: 400
        };
        const settings = { ...defaults, ...options };
        const features = Object.entries(settings)
            .map(([k, v]) => `${k}=${v}`)
            .join(',');
        window.open(url, 'PopupWindow', features);
    }
    
    // Print function
    function printPage() {
        if (window.print) {
            setTimeout(() => window.print(), 200);
        } else {
            const isMac = navigator.platform.toUpperCase().includes('MAC');
            alert(isMac 
                ? "Press 'Cmd+P' on your keyboard to print." 
                : "Press 'Ctrl+P' on your keyboard to print."
            );
        }
    }
    
    // Date formatting
    function getFormattedDate() {
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
        const now = new Date();
        const date = String(now.getDate()).padStart(2, '0');
        return `${days[now.getDay()]}, ${months[now.getMonth()]} ${date}, ${now.getFullYear()}`;
    }
    </script>
</head>

<body>
    <p class="ahem">
        <strong>This web site is designed for accessibility. Content is obtainable and functional 
        to any browser or Internet device. This page's full visual experience is available in a 
        graphical browser that supports web standards. 
        See <a href="https://www.webstandards.org/upgrade/">reasons to upgrade your browser</a>.</strong>
    </p>
    
    <a id="top"></a>

<header class="site-header">
    <div class="header-inner">
        <div class="header-title">
            SCDF HPSS Mass Storage Group
        </div>
        <div class="header-logo">
            <a href="https://www.bnl.gov" target="_blank" rel="noopener">
                <img
                    src="images/bnl_logo_horizontal_white.png"
                    alt="Brookhaven National Laboratory"
                >
            </a>
        </div>
    </div>
</header>

<div>
    <table style="width:100%">
        <tr>
            <td class="navbar">
                <p>
                    <span style="color:#ccc;">BNL:</span>&nbsp;
                    <a href="index_RACF.php">SCDF HPSS Admin Group</a> |
                    <a href="index_USATLAS.php">US-Atlas</a> |
                    <a href="index_STAR_DC.php">Star Data Carousel</a> |
                    <a href="index_STAR_CRS.php">Star CRS</a> |
                    <a href="index_PHNX_DC.php">Phenix Data Carousel</a> |
                    <a href="index_PHNX_CRS.php">Phenix CRS</a>
                </p>
            </td>
        </tr>
    </table>
</div>
    
    <div style="display:flex;width:100%">
        <aside class="printhide" style="width:180px;flex-shrink:0;overflow:hidden">
            <div id="verticalMenu" style="margin-top:0;">
                <p class="category" style="margin-top:0;">HPSS</p>
                <p>
                    <a href="index_HPSS.php">SCDF HPSS Mass Storage</a>
                </p>
                <p>
                    <a href="https://webdocs.racf.bnl.gov/docs/service/hpss" target="_blank" rel="noopener">
                        SCDF HPSS Webdoc
                    </a>
                </p>
                <p>
                    <!-- This uses dynamic URL construction to adapt to HTTP/HTTPS but relative paths are OK too
                    <a href="<?= htmlspecialchars(((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']); ?>/statperf/statindex.html" target="_blank" rel="noopener">
                        HPSS System Status and Statistics
                    </a>
                    --> 
                    <a href="statperf/statindex.html" target="_blank" rel="noopener">
                        HPSS System Status and Statistics
                    </a>
                </p>
                <p>
                    <a href="https://www.hpss-collaboration.org/" target="_blank" rel="noopener">
                        About HPSS
                    </a>
                </p>

                <p class="category">BNL</p>
                <p>
                    <a href="https://www.bnl.gov/world/" target="_blank" rel="noopener">
                        About BNL
                    </a>
                </p>
                <p>
                    <a href="https://www.bnl.gov" target="_blank" rel="noopener">
                        BNL Intranet
                    </a>
                </p>
                <p>
                    <a href="https://drupal.star.bnl.gov/STAR/comp/sofi/tutorials/carousel" target="_blank" rel="noopener">
                        Data Carousel
                    </a>
                </p>

                <p class="category">SCDF</p>
                <p>
                    <a href="https://www.sdcc.bnl.gov/" target="_blank" rel="noopener">
                        About SCDF
                    </a>
                </p>
                <p>
                    <a href="https://web.racf.bnl.gov/Facility/LinuxFarm/crsweb/" target="_blank" rel="noopener">
                        SCDF CRS
                    </a>
                </p>

                <p class="category">ATLAS</p>
                <p>
                    <a href="https://atlas.cern/" target="_blank" rel="noopener">
                        ATLAS
                    </a>
                </p>
                <p>
                    <a href="https://www.usatlas.bnl.gov/" target="_blank" rel="noopener">
                        US-ATLAS
                    </a>
                </p>
            </div>
        </aside>
        <main style="flex-grow:1;padding:0">
            <!--
            <div style="background:#ffffcc; color:#333; padding:8px 16px; border-bottom:1px solid #ccc; font-size:1em;">
        This is the new HPSS web server. The <a href="https://www.racf.bnl.gov/Facility/HPSS/Monitoring/index_RACF.php" target="_blank" rel="noopener">old server</a> is still available for cross-checks.
            </div>
            -->
    <!-- Content starts here -->