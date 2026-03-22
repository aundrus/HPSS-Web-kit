<?php
declare(strict_types=1);
/**
 * Header template (auto-refresh only)
 * PHP 8.2 compatible
 */

// Ensure variables have defaults
$refresh = isset($refresh) && is_numeric($refresh) ? (int)$refresh : 0;
$newURL = $newURL ?? '';

// Build refresh content
$refreshContent = '';
if ($refresh > 0) {
    $refreshContent = $refresh . ($newURL !== '' ? ";URL={$newURL}" : '');
}

// Only output meta refresh if needed
if ($refresh > 0): ?>
<meta http-equiv="refresh" content="<?= h($refreshContent) ?>">
<?php endif; ?>