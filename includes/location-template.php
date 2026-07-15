<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$location = $locations[$locationSlug] ?? null;
if (!$location) {
    http_response_code(404);
    $pageMeta = ['title' => 'Location Not Found - Mega Techzy', 'description' => 'The requested location page was not found.', 'path' => 'locations/'];
    include dirname(__DIR__) . '/includes/header.php';
    include dirname(__DIR__) . '/includes/navbar.php';
    echo '<main id="main" class="section"><div class="container"><h1>Location not found</h1><p>Please browse all Mega Techzy locations.</p><a class="btn btn-primary" href="/locations/">View locations</a></div></main>';
    include dirname(__DIR__) . '/includes/footer.php';
    exit;
}

$pageMeta = [
    'title' => $location['headline'] . ' - Mega Techzy',
    'description' => 'Mega Techzy provides website development, SEO, paid ads, branding and lead generation for businesses looking for a ' . $location['keyword'] . '.',
    'path' => 'locations/' . $locationSlug . '.php',
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Locations', 'path' => 'locations/'],
        ['name' => $location['name'], 'path' => 'locations/' . $locationSlug . '.php'],
    ]),
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">Local SEO Focus</p>
                <h1><?= e($location['headline']); ?></h1>
                <p>Mega Techzy helps <?= e($location['name']); ?> businesses build stronger online trust through premium websites, SEO, paid campaigns, content, automation and lead generation.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="#location-form">Get local strategy <?= icon_svg('arrow'); ?></a>
                    <a class="btn btn-secondary" href="/services/">View services</a>
                </div>
            </div>
            <aside class="proof-panel">
                <span class="card-icon"><?= icon_svg('map'); ?></span>
                <h2>Why local pages matter</h2>
                <p>Location-specific pages help customers and search engines understand your relevance, services, proof and service area more clearly.</p>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">Local growth plan</p>
                <h2>Built for searches like <?= e($location['keyword']); ?></h2>
                <p>We connect service pages, local intent keywords, conversion-focused copy and analytics so your business can compete for high-value searches in <?= e($location['name']); ?>.</p>
            </div>
            <div class="check-list">
                <div><?= icon_svg('check'); ?><span>SEO-friendly website structure and fast mobile pages.</span></div>
                <div><?= icon_svg('check'); ?><span>Google Ads and Meta Ads campaigns for local demand.</span></div>
                <div><?= icon_svg('check'); ?><span>Lead capture forms with tracking and follow-up workflows.</span></div>
                <div><?= icon_svg('check'); ?><span>Content and internal links that support location relevance.</span></div>
            </div>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Recommended services</p>
                <h2>High-impact services for <?= e($location['name']); ?> businesses</h2>
            </div>
        </div>
        <div class="container card-grid">
            <?php foreach (['website-development', 'seo', 'google-ads', 'lead-generation'] as $slug): $service = $services[$slug]; ?>
                <article class="service-card">
                    <span class="card-icon"><?= icon_svg($service['icon']); ?></span>
                    <h3><a href="/services/<?= e($slug); ?>.php"><?= e($service['name']); ?></a></h3>
                    <p><?= e($service['intro']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section cta-section" id="location-form">
        <div class="container cta-layout">
            <div>
                <p class="eyebrow">Start local</p>
                <h2>Want more enquiries from <?= e($location['name']); ?>?</h2>
                <p>Share your business goals and Mega Techzy will suggest the best first move.</p>
            </div>
            <div class="form-shell">
                <?php $formContext = $location['name'] . ' location page'; include dirname(__DIR__) . '/includes/lead-form.php'; ?>
            </div>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

