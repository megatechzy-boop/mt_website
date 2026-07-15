<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';

$pageMeta = [
    'title' => 'Mega Techzy - Digital Marketing Company in Pune, PCMC and Solapur',
    'description' => 'Mega Techzy is a premium digital marketing and website development company helping businesses grow with SEO, Google Ads, Meta Ads, branding and lead generation.',
    'path' => '',
];
$pageSchemas = [
    faq_schema($homeFaqs),
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
    ]),
];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main">
    <section class="hero">
        <div class="container hero-inner">
            <div class="hero-copy">
                <p class="eyebrow eyebrow-light">Digital growth studio for ambitious brands</p>
                <h1>Make your brand<br><span>impossible to ignore.</span></h1>
                <p class="hero-lede">Mega Techzy combines standout websites, sharp SEO, high-intent advertising and automation into one growth system that actually feels premium.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="/contact.php">Get Free Strategy Call <?= icon_svg('arrow'); ?></a>
                    <a class="btn btn-secondary" href="/services/">Explore Services</a>
                </div>
                <dl class="hero-metrics" aria-label="Mega Techzy strengths">
                    <div><dt>95+</dt><dd>Performance target</dd></div>
                    <div><dt>14</dt><dd>Growth services</dd></div>
                    <div><dt>3</dt><dd>Primary markets</dd></div>
                </dl>
                <p class="hero-location"><span></span> Pune, PCMC and Solapur</p>
            </div>
            <div class="hero-visual" aria-label="Mega Techzy premium growth dashboard">
                <div class="hero-logo-card">
                    <img src="/assets/images/mega-techzy-logo.png" alt="Mega Techzy logo" width="520" height="527">
                </div>
                <div class="dashboard-card dashboard-card-main">
                    <span class="mini-label">SEO Growth</span>
                    <strong>+68%</strong>
                    <div class="growth-line"><span></span><span></span><span></span><span></span><span></span></div>
                </div>
                <div class="dashboard-card dashboard-card-secondary">
                    <span class="mini-label">Lead Funnel</span>
                    <div class="funnel-bars"><span></span><span></span><span></span></div>
                </div>
                <div class="dashboard-card dashboard-card-tertiary">
                    <?= icon_svg('shield'); ?>
                    <span>Trust-first websites</span>
                </div>
            </div>
        </div>
    </section>

    <section class="trust-strip" aria-label="Trusted by businesses">
        <div class="container trust-row">
            <span>Trusted by growth-focused teams in</span>
            <strong>Pune</strong><strong>PCMC</strong><strong>Solapur</strong><strong>Maharashtra</strong>
        </div>
    </section>

    <section class="section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Services</p>
                <h2>Everything your digital growth engine needs</h2>
            </div>
            <a class="link-arrow" href="/services/">View all services <?= icon_svg('arrow'); ?></a>
        </div>
        <div class="container card-grid service-grid">
            <?php $serviceIndex = 1; foreach (array_slice($services, 0, 8) as $slug => $service): ?>
                <article class="service-card">
                    <span class="service-number">0<?= $serviceIndex++; ?></span>
                    <span class="card-icon"><?= icon_svg($service['icon']); ?></span>
                    <h3><a href="/services/<?= e($slug); ?>.php"><?= e($service['name']); ?></a></h3>
                    <p><?= e($service['intro']); ?></p>
                    <a class="service-link" href="/services/<?= e($slug); ?>.php">Explore service <?= icon_svg('arrow'); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container feature-layout">
            <div>
                <p class="eyebrow">Why Mega Techzy</p>
                <h2>Built for trust, ranking and conversion</h2>
                <p>Every page is planned to answer why customers should trust the business and why Google should rank it above competitors.</p>
            </div>
            <div class="feature-list">
                <div><?= icon_svg('shield'); ?><span>Secure PHP forms with CSRF, honeypot and server-side validation.</span></div>
                <div><?= icon_svg('search'); ?><span>SEO-first structure with metadata, schema, internal links and location intent.</span></div>
                <div><?= icon_svg('chart'); ?><span>Analytics-ready conversion paths that make campaign decisions clearer.</span></div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Industries</p>
                <h2>Marketing systems for practical business growth</h2>
            </div>
        </div>
        <div class="container pill-grid">
            <?php foreach ($industries as $industry): ?>
                <span><?= e($industry); ?></span>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section process-section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Process</p>
                <h2>A clean growth workflow from audit to optimization</h2>
            </div>
        </div>
        <div class="container process-grid">
            <?php foreach (['Discover' => 'Audit goals, audience, competitors and current digital assets.', 'Build' => 'Create the website, campaigns, content and tracking foundations.', 'Launch' => 'Go live with QA, conversion checks and clear reporting.', 'Improve' => 'Use data to refine pages, keywords, ads, creatives and follow-up.'] as $step => $copy): ?>
                <article>
                    <span><?= e($step); ?></span>
                    <p><?= e($copy); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Portfolio</p>
                <h2>Featured growth work</h2>
            </div>
            <a class="link-arrow" href="/portfolio/">See portfolio <?= icon_svg('arrow'); ?></a>
        </div>
        <div class="container card-grid">
            <?php foreach ($portfolioItems as $item): ?>
                <article class="case-card">
                    <p class="eyebrow"><?= e($item['type']); ?></p>
                    <h3><?= e($item['title']); ?></h3>
                    <p><?= e($item['result']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container testimonial-grid">
            <div>
                <p class="eyebrow">Success Stories</p>
                <h2>Clearer systems, stronger enquiries</h2>
                <p>Mega Techzy focuses on the full customer path: search visibility, landing page trust, tracking accuracy and fast follow-up.</p>
            </div>
            <blockquote>
                "The biggest improvement was clarity. Our website, ads and reports finally started working together."
                <cite>Growth partner client</cite>
            </blockquote>
        </div>
    </section>

    <section class="section tech-section">
        <div class="container">
            <p class="eyebrow">Technologies</p>
            <h2>Lightweight stack, serious foundations</h2>
            <div class="tech-list">
                <span>HTML5</span><span>CSS3</span><span>JavaScript</span><span>PHP 8+</span><span>GA4</span><span>GTM</span><span>Looker Studio</span><span>Zoho</span>
            </div>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Locations</p>
                <h2>Local SEO focus across Pune, PCMC and Solapur</h2>
            </div>
            <a class="link-arrow" href="/locations/">View locations <?= icon_svg('arrow'); ?></a>
        </div>
        <div class="container location-grid">
            <?php foreach (array_slice($locations, 0, 9) as $slug => $location): ?>
                <a href="/locations/<?= e($slug); ?>.php"><?= icon_svg('map'); ?><?= e($location['name']); ?></a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Latest Blogs</p>
                <h2>Practical growth thinking</h2>
            </div>
            <a class="link-arrow" href="/blog/">Read blog <?= icon_svg('arrow'); ?></a>
        </div>
        <div class="container card-grid">
            <?php foreach ($blogPosts as $post): ?>
                <article class="blog-card">
                    <h3><a href="/blog/<?= e($post['slug']); ?>.php"><?= e($post['title']); ?></a></h3>
                    <p><?= e($post['excerpt']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section faq-section">
        <div class="container narrow">
            <p class="eyebrow">FAQs</p>
            <h2>Questions businesses ask before starting</h2>
            <?php foreach ($homeFaqs as $faq): ?>
                <details>
                    <summary><?= e($faq['q']); ?></summary>
                    <p><?= e($faq['a']); ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section cta-section">
        <div class="container cta-layout">
            <div>
                <p class="eyebrow">Final CTA</p>
                <h2>Ready to build a website and marketing system that can rank, convert and scale?</h2>
            </div>
            <div class="form-shell">
                <?php $formContext = 'Homepage final CTA'; include __DIR__ . '/includes/lead-form.php'; ?>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
