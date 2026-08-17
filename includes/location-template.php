<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$location = $locations[$locationSlug] ?? null;
if (!$location) {
    http_response_code(404);
    $pageMeta = ['title' => 'Location Not Found - Mega Techzy', 'description' => 'The requested location page was not found.', 'path' => 'locations/', 'robots' => 'noindex, follow'];
    include dirname(__DIR__) . '/includes/header.php';
    include dirname(__DIR__) . '/includes/navbar.php';
    echo '<main id="main" class="section"><div class="container"><h1>Location not found</h1><p>Please browse all Mega Techzy locations.</p><a class="btn btn-primary" href="/locations/">View locations</a></div></main>';
    include dirname(__DIR__) . '/includes/footer.php';
    exit;
}

$locationFaqs = $location['faqs'] ?? [
    [
        'q' => 'Does Mega Techzy provide digital marketing and website services in ' . $location['name'] . '?',
        'a' => 'Yes. Mega Techzy supports project-based website development, SEO, paid campaigns, analytics and lead-generation work for suitable businesses in ' . $location['name'] . ' and across Maharashtra.',
    ],
    [
        'q' => 'Can the project be delivered remotely?',
        'a' => 'Yes. Discovery, content reviews, development milestones, campaign reporting and most support can be handled remotely. Any location-specific meeting requirement is confirmed during scoping.',
    ],
    [
        'q' => 'Does a city landing page guarantee Google rankings?',
        'a' => 'No. A useful city page can clarify service relevance, but rankings also depend on competition, technical quality, content usefulness, authority and genuine business evidence.',
    ],
];
$recommendedServices = $location['focus'] ?? ['website-development', 'seo', 'google-ads', 'lead-generation'];

$indexableLocationSlugs = array_keys(array_filter(
    $locations,
    static fn (array $candidate): bool => !empty($candidate['indexable'])
));
$divisionLocationSlugs = array_values(array_filter(
    $indexableLocationSlugs,
    static fn (string $slug): bool => ($locations[$slug]['division'] ?? null) === ($location['division'] ?? null)
));
$sameDivisionSlugs = [];
$currentDivisionIndex = array_search($locationSlug, $divisionLocationSlugs, true);
if ($currentDivisionIndex !== false && count($divisionLocationSlugs) > 1) {
    for ($offset = 1; $offset < count($divisionLocationSlugs); $offset++) {
        $relatedSlug = $divisionLocationSlugs[($currentDivisionIndex + $offset) % count($divisionLocationSlugs)];
        if ($relatedSlug !== $locationSlug) {
            $sameDivisionSlugs[] = $relatedSlug;
        }
    }
}
$otherLocationSlugs = array_values(array_filter(
    $indexableLocationSlugs,
    static fn (string $slug): bool => $slug !== $locationSlug && !in_array($slug, $sameDivisionSlugs, true)
));
$relatedLocationSlugs = array_slice(array_merge($sameDivisionSlugs, $otherLocationSlugs), 0, 6);

$guideCatalog = [
    'website-development' => ['slug' => 'local-business-website-features', 'title' => 'Website features every local business needs'],
    'seo' => ['slug' => 'local-seo-checklist-pune-businesses', 'title' => 'A practical local SEO checklist'],
    'google-ads' => ['slug' => 'google-ads-local-services-guide', 'title' => 'Google Ads for local services'],
    'lead-generation' => ['slug' => 'landing-page-checklist-lead-generation', 'title' => 'Landing page checklist for lead generation'],
    'analytics' => ['slug' => 'ga4-setup-lead-generation-websites', 'title' => 'GA4 setup for lead-generation websites'],
    'content-marketing' => ['slug' => 'technical-seo-checklist-new-website', 'title' => 'Technical SEO checklist for a new website'],
];
$locationGuides = [];
foreach (array_merge($recommendedServices, array_keys($guideCatalog)) as $serviceSlug) {
    if (isset($guideCatalog[$serviceSlug])) {
        $locationGuides[$guideCatalog[$serviceSlug]['slug']] = $guideCatalog[$serviceSlug];
    }
    if (count($locationGuides) === 3) {
        break;
    }
}

$pageMeta = [
    'title' => ($location['title'] ?? $location['headline']) . ' - Mega Techzy',
    'description' => $location['meta'] ?? ('Mega Techzy provides website development, SEO, paid ads, branding and lead generation for businesses looking for a ' . $location['keyword'] . '.'),
    'path' => 'locations/' . $locationSlug . '.php',
    'robots' => !empty($location['indexable']) ? 'index, follow' : 'noindex, follow',
    'about' => [$location['name'], $location['keyword'], 'website development', 'SEO', 'digital marketing'],
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Locations', 'path' => 'locations/'],
        ['name' => $location['name'], 'path' => 'locations/' . $locationSlug . '.php'],
    ]),
];
if (!empty($location['indexable'])) {
    $pageSchemas[] = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        '@id' => site_url('locations/' . $locationSlug) . '#service',
        'name' => $location['headline'],
        'serviceType' => 'Website development, SEO and digital marketing',
        'provider' => ['@id' => SITE_URL . '/#organization'],
        'areaServed' => [
            '@type' => 'City',
            'name' => $location['name'],
            'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => 'Maharashtra'],
        ],
        'description' => $pageMeta['description'],
        'url' => site_url('locations/' . $locationSlug),
    ];
    if ($locationFaqs) {
        $pageSchemas[] = faq_schema($locationFaqs);
    }
}
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">Local SEO Focus</p>
                <h1><?= e($location['headline']); ?></h1>
                <p><?= e($location['intro'] ?? ('Mega Techzy helps ' . $location['name'] . ' businesses build stronger online trust through premium websites, SEO, paid campaigns, content, automation and lead generation.')); ?></p>
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

    <?php if (!empty($location['market_context'])): ?>
        <section class="section">
            <div class="container two-column">
                <div>
                    <p class="eyebrow"><?= e($location['coverage'] ?? 'Maharashtra city market'); ?></p>
                    <h2>A practical digital strategy for <?= e($location['name']); ?></h2>
                    <p><?= e($location['market_context']); ?></p>
                </div>
                <?php if (!empty($location['audiences'])): ?>
                    <div class="check-list">
                        <?php foreach ($location['audiences'] as $audience): ?>
                            <div><?= icon_svg('check'); ?><span>Pages and campaigns for <?= e($audience); ?>.</span></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($location['sections'])): ?>
        <section class="section">
            <div class="container narrow">
                <?php foreach ($location['sections'] as $section): ?>
                    <h2><?= e($section['title']); ?></h2>
                    <p><?= e($section['copy']); ?></p>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

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

    <?php if ($locationFaqs): ?>
        <section class="section faq-section">
            <div class="container narrow">
                <p class="eyebrow">FAQs</p>
                <h2>Digital marketing and website questions from <?= e($location['name']); ?> businesses</h2>
                <?php foreach ($locationFaqs as $faq): ?>
                    <details>
                        <summary><?= e($faq['q']); ?></summary>
                        <p><?= e($faq['a']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="section soft-section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Recommended services</p>
                <h2>High-impact services for <?= e($location['name']); ?> businesses</h2>
            </div>
        </div>
        <div class="container card-grid">
            <?php foreach ($recommendedServices as $slug): if (!isset($services[$slug])) continue; $service = $services[$slug]; ?>
                <article class="service-card">
                    <span class="card-icon"><?= icon_svg($service['icon']); ?></span>
                    <h3><a href="/services/<?= e($slug); ?>"><?= e($service['name']); ?></a></h3>
                    <p><?= e($service['intro']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Continue exploring</p>
                <h2>Nearby markets and useful guides for <?= e($location['name']); ?></h2>
            </div>
            <p>Compare nearby Maharashtra markets and use these practical guides to plan the website, search and lead-generation work behind a local campaign.</p>
        </div>
        <?php if ($relatedLocationSlugs): ?>
            <div class="container location-grid" aria-label="Related Maharashtra locations">
                <?php foreach ($relatedLocationSlugs as $relatedSlug): ?>
                    <a href="/locations/<?= e($relatedSlug); ?>"><?= icon_svg('map'); ?> <?= e($locations[$relatedSlug]['name']); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="container card-grid" style="margin-top:1.25rem">
            <?php foreach ($locationGuides as $guide): ?>
                <article class="blog-card">
                    <p class="eyebrow">Practical guide</p>
                    <h3><a href="/blog/<?= e($guide['slug']); ?>"><?= e($guide['title']); ?></a></h3>
                    <a class="link-arrow" href="/blog/<?= e($guide['slug']); ?>">Read guide <?= icon_svg('arrow'); ?></a>
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
