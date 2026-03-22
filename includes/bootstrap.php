<?php
declare(strict_types=1);

/**
 * Common bootstrap file for HPSS monitoring pages
 * PHP 8.2+ compatible
 */

// Prevent multiple inclusions
if (defined('HPSS_BOOTSTRAP_LOADED')) {
    return;
}
define('HPSS_BOOTSTRAP_LOADED', true);

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');

/**
 * Detect device type from user agent
 */
function detectDevice(): string 
{
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
    
    if (str_contains($userAgent, 'iphone') || 
        str_contains($userAgent, 'ipod') || 
        str_contains($userAgent, 'ipad')) {
        return 'IOS';
    }
    
    if (str_contains($userAgent, 'blackberry')) {
        return 'BLACKBERRY';
    }
    
    if (str_contains($userAgent, 'android')) {
        return 'ANDROID';
    }
    
    return 'default';
}

/**
 * Get validated refresh interval
 */
function getRefreshInterval(int $default = 60, int $max = 3600): int 
{
    $refresh = filter_input(INPUT_GET, 'refresh', FILTER_VALIDATE_INT);
    
    if ($refresh === false || $refresh === null) {
        return $default;
    }
    
    return max(0, min($refresh, $max));
}

/**
 * Check if frame mode is disabled
 */
function isFrameDisabled(): bool 
{
    $bf = filter_input(INPUT_GET, 'BF', FILTER_UNSAFE_RAW) ?? '';
    return strtoupper(trim($bf)) === 'OFF';
}

/**
 * Sanitize output for HTML
 */
function h(string $text): string 
{
    return htmlspecialchars($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Create an HTML link with proper escaping
 */
function createLink(string $url, string $text, string $class = ''): string
{
    $escapedUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $classAttr = $class !== '' ? " class=\"{$class}\"" : '';
    return "<a href=\"{$escapedUrl}\" target=\"_blank\" rel=\"noopener noreferrer\"{$classAttr}>{$text}</a>";
}