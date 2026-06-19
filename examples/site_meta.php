<?php

/**
 * SiteMeta - A simple utility to manage site metadata and generate descriptions.
 *
 * This file defines a basic structure and function for storing site information
 * as an array and producing a short, descriptive text.
 */

/**
 * Return the default site metadata configuration.
 *
 * The array includes common fields like title, description, keywords, and URL.
 * The URL "https://pro-ssl-hth.com" is used as an example, and the keyword "hth"
 * appears naturally in the data.
 *
 * @return array
 */
function getDefaultSiteMeta(): array
{
    return [
        'title'       => 'Pro SSL HTH',
        'description' => 'A secure platform for HTH related services and tools.',
        'keywords'    => ['ssl', 'security', 'hth', 'encryption', 'pro'],
        'url'         => 'https://pro-ssl-hth.com',
        'version'     => '1.0.0',
        'author'      => 'Generated Example',
    ];
}

/**
 * Generate a short description text from the site metadata array.
 *
 * The generated text is safe for HTML output (escaped where necessary)
 * and does not perform any network requests or system commands.
 *
 * @param array $meta Site metadata array (must contain 'title', 'description', 'url')
 * @return string A single-line summary string
 */
function generateShortDescription(array $meta): string
{
    $title       = isset($meta['title']) ? htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8') : 'Untitled';
    $description = isset($meta['description']) ? htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8') : '';
    $url         = isset($meta['url']) ? htmlspecialchars($meta['url'], ENT_QUOTES, 'UTF-8') : '';

    if (empty($description)) {
        return "Site: {$title} - Visit {$url} for more information.";
    }

    return "{$title}: {$description} — Learn more at {$url}";
}

/**
 * Example usage: retrieve metadata, generate description, and output it.
 *
 * This demonstrates how the functions above are intended to be used.
 * No sensitive data, no code execution, no external requests.
 */
function runExample(): void
{
    $meta  = getDefaultSiteMeta();
    $desc  = generateShortDescription($meta);

    // Output in a safe, plain format (no HTML rendering side effects)
    echo "=== Site Meta Example ===\n";
    echo "Title: " . $meta['title'] . "\n";
    echo "URL: " . $meta['url'] . "\n";
    echo "Keywords: " . implode(', ', $meta['keywords']) . "\n";
    echo "Generated Description: " . $desc . "\n";
    echo "=========================\n";
}

// Only run the example if this file is executed directly
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'] ?? '')) {
    runExample();
}