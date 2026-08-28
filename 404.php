<?php
declare(strict_types=1);

require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';

http_response_code(404);

$pageMeta = [
    'title' => 'Page Not Found - Mega Techzy',
    'description' => 'The requested page could not be found. Explore Mega Techzy services, locations and digital marketing guides.',
    'path' => '404',
    'robots' => 'noindex, follow',
    'schema_type' => 'WebPage',
];

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">Error 404</p>
                <h1>This page could not be found</h1>
                <p>The link may be outdated, or the page may have moved. Choose a useful destination below to continue exploring Mega Techzy.</p>
                <div class="hero-actions">
                    <a class="agency-button agency-button-gold" href="/">Go to homepage <?= icon_svg('arrow'); ?></a>
                    <a class="agency-button agency-button-outline" href="/contact">Contact Mega Techzy</a>
                </div>
            </div>
            <aside class="proof-panel" aria-labelledby="helpful-links-title">
                <p class="eyebrow">Helpful links</p>
                <h2 id="helpful-links-title">Where would you like to go?</h2>
                <p><a class="link-arrow" href="/services/">Explore our services <?= icon_svg('arrow'); ?></a></p>
                <p><a class="link-arrow" href="/locations/">View service locations <?= icon_svg('arrow'); ?></a></p>
                <p><a class="link-arrow" href="/blog/">Read digital growth guides <?= icon_svg('arrow'); ?></a></p>
            </aside>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
