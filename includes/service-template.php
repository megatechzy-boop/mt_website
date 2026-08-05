<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$service = $services[$serviceSlug] ?? null;
if (!$service) {
    http_response_code(404);
    $pageMeta = ['title' => 'Service Not Found - Mega Techzy', 'description' => 'The requested service page was not found.', 'path' => 'services/', 'robots' => 'noindex, follow'];
    include dirname(__DIR__) . '/includes/header.php';
    include dirname(__DIR__) . '/includes/navbar.php';
    echo '<main id="main" class="section"><div class="container"><h1>Service not found</h1><p>Please browse all Mega Techzy services.</p><a class="btn btn-primary" href="/services/">View services</a></div></main>';
    include dirname(__DIR__) . '/includes/footer.php';
    exit;
}

$pageMeta = [
    'title' => $service['title'],
    'description' => $service['meta'],
    'path' => 'services/' . $serviceSlug . '.php',
    'about' => [$service['name'], 'digital marketing', 'Maharashtra', 'India'],
];
if ($serviceSlug === 'website-development') {
    $pageMeta['language'] = 'en-IN';
    $pageMeta['hreflang'] = [
        'en-IN' => site_url('services/website-development'),
        'en' => site_url('international/website-development'),
        'x-default' => site_url('international/website-development'),
    ];
}
$pageSchemas = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        '@id' => site_url('services/' . $serviceSlug) . '#service',
        'name' => $service['name'],
        'serviceType' => $service['name'],
        'provider' => ['@id' => SITE_URL . '/#organization'],
        'areaServed' => [
            ['@type' => 'AdministrativeArea', 'name' => 'Maharashtra'],
            ['@type' => 'Country', 'name' => 'India'],
        ],
        'description' => $service['meta'],
        'url' => site_url('services/' . $serviceSlug),
    ],
    faq_schema($service['faqs']),
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Services', 'path' => 'services/'],
        ['name' => $service['name'], 'path' => 'services/' . $serviceSlug . '.php'],
    ]),
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">Mega Techzy Service</p>
                <h1><?= e($service['title']); ?></h1>
                <p><?= e($service['intro']); ?></p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="#service-form">Discuss this service <?= icon_svg('arrow'); ?></a>
                    <a class="btn btn-secondary" href="/services/">All services</a>
                </div>
            </div>
            <aside class="proof-panel">
                <span class="card-icon"><?= icon_svg($service['icon']); ?></span>
                <h2>Why it works</h2>
                <p><?= e($service['proof']); ?></p>
                <p><strong>Established in 2019.</strong> Mega Techzy has served 100+ clients and delivered 50+ projects.</p>
            </aside>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container narrow">
            <p class="eyebrow">Quick answer</p>
            <h2>What does <?= e(strtolower($service['name'])); ?> include?</h2>
            <p><strong><?= e($service['name']); ?></strong> from Mega Techzy combines strategy, implementation and measurement around a clear business goal. The exact scope is agreed after reviewing your audience, current setup, market and enquiry process.</p>
            <div class="check-list">
                <?php foreach (array_slice($service['deliverables'], 0, 4) as $deliverable): ?>
                    <div><?= icon_svg('check'); ?><span><?= e($deliverable); ?></span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">Outcomes</p>
                <h2>Business results this service is built to support</h2>
                <div class="check-list">
                    <?php foreach ($service['outcomes'] as $outcome): ?>
                        <div><?= icon_svg('check'); ?><span><?= e($outcome); ?></span></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div>
                <p class="eyebrow">Deliverables</p>
                <h2>What Mega Techzy can handle</h2>
                <div class="check-list">
                    <?php foreach ($service['deliverables'] as $deliverable): ?>
                        <div><?= icon_svg('check'); ?><span><?= e($deliverable); ?></span></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Related services</p>
                <h2>Connect this service into a complete growth system</h2>
            </div>
        </div>
        <div class="container card-grid">
            <?php foreach ($service['related'] as $relatedSlug): $related = $services[$relatedSlug]; ?>
                <article class="service-card">
                    <span class="card-icon"><?= icon_svg($related['icon']); ?></span>
                    <h3><a href="/services/<?= e($relatedSlug); ?>"><?= e($related['name']); ?></a></h3>
                    <p><?= e($related['intro']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section faq-section">
        <div class="container narrow">
            <p class="eyebrow">FAQs</p>
            <h2><?= e($service['name']); ?> questions</h2>
            <?php foreach ($service['faqs'] as $faq): ?>
                <details>
                    <summary><?= e($faq['q']); ?></summary>
                    <p><?= e($faq['a']); ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section cta-section" id="service-form">
        <div class="container cta-layout">
            <div>
                <p class="eyebrow">Start here</p>
                <h2>Tell us what you want <?= e(strtolower($service['name'])); ?> to achieve.</h2>
                <p>We will review your goals and suggest a practical next step for your business and market.</p>
            </div>
            <div class="form-shell">
                <?php $formContext = $service['name'] . ' service page'; include dirname(__DIR__) . '/includes/lead-form.php'; ?>
            </div>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
