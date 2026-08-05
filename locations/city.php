<?php
declare(strict_types=1);

$locationSlug = strtolower(trim((string) ($_GET['location'] ?? '')));
if (!preg_match('/^[a-z0-9-]+$/', $locationSlug)) {
    $locationSlug = '';
}

include dirname(__DIR__) . '/includes/location-template.php';
