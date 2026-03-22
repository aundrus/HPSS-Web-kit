<?php
// filepath: /Users/alexanderundrus/VS-HPSS-Web/HPSS-Web/tapeUsage4/graph/calendar/datespick_html5.php
declare(strict_types=1);

/**
 * Simple HTML5 Date Picker
 * PHP 8.2 compatible
 * No external dependencies
 */

function dates_pick(string $baseUrl, int $startUnixtime, int $endUnixtime): void {
    $startDate = date('Y-m-d', $startUnixtime);
    $endDate = date('Y-m-d', $endUnixtime);
    $today = date('Y-m-d');
    
    // Parse existing query string from baseUrl
    $urlParts = parse_url($baseUrl);
    $existingParams = [];
    if (isset($urlParts['query'])) {
        parse_str($urlParts['query'], $existingParams);
    }
    $basePath = $urlParts['path'] ?? '';
    ?>
    <form method="get" action="<?= htmlspecialchars($basePath, ENT_QUOTES) ?>" style="display:inline-block;">
        <?php foreach ($existingParams as $key => $value): ?>
            <?php if ($key !== 'date1' && $key !== 'date2'): ?>
            <input type="hidden" name="<?= htmlspecialchars($key, ENT_QUOTES) ?>" value="<?= htmlspecialchars((string)$value, ENT_QUOTES) ?>">
            <?php endif; ?>
        <?php endforeach; ?>
        
        <table border="0" cellpadding="5" style="display:inline-table;">
            <tr>
                <td>
                    <label for="date1" style="font-family:Arial;font-size:13px;">From:</label>
                    <input type="date" id="date1" name="date1" value="<?= $startDate ?>" max="<?= $today ?>" required
                           style="padding:5px;font-size:13px;">
                </td>
                <td>
                    <label for="date2" style="font-family:Arial;font-size:13px;">To:</label>
                    <input type="date" id="date2" name="date2" value="<?= $endDate ?>" max="<?= $today ?>" required
                           style="padding:5px;font-size:13px;">
                </td>
                <td>
                    <button type="submit" style="padding:5px 15px;font-size:13px;cursor:pointer;">
                        Update
                    </button>
                </td>
            </tr>
        </table>
    </form>
    <?php
}