<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$pageMeta = [
    'title' => 'Mega Techzy Locations - Pune, PCMC, Solapur and Maharashtra',
    'description' => 'Explore Mega Techzy local SEO pages for Pune, PCMC, Solapur, Nigdi, Pimpri, Chinchwad, Wakad, Baner, Hinjawadi and more.',
    'path' => 'locations/',
    'robots' => 'noindex, follow',
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Locations', 'path' => 'locations/'],
    ]),
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Locations</p>
            <h1>Local digital marketing coverage across Pune, PCMC and Solapur</h1>
            <p>Dedicated local pages support the searches customers actually use when comparing website development, SEO, ads and lead generation partners.</p>
        </div>
    </section>
    <section class="section">
        <div class="container location-grid">
            <?php foreach ($locations as $slug => $location): ?>
                <a href="/locations/<?= e($slug); ?>.php"><?= icon_svg('map'); ?><?= e($location['headline']); ?></a>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
