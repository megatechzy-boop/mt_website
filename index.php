<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';

$pageMeta = [
    'title' => 'Mega Techzy - Digital Marketing Company in Pune, PCMC and Solapur',
    'description' => 'Mega Techzy is a digital marketing and website development company established in 2019, serving businesses in Pune, PCMC, Solapur and across India with SEO, Google Ads, websites and automation.',
    'path' => '',
];
$pageSchemas = [
    faq_schema($homeFaqs),
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
    ]),
    [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        'name' => 'Mega Techzy - Digital Marketing Company in Pune, PCMC and Solapur',
        'description' => 'Digital marketing, website development, SEO, paid ads and automation services from Mega Techzy.',
        'url' => site_url(),
        'about' => ['Digital marketing', 'Website development', 'SEO', 'Lead generation'],
    ],
];
$industryShowcase = [
    ['name' => 'Manufacturing', 'image' => 'industry-manufacturing.webp', 'copy' => 'Industrial visibility and lead systems.'],
    ['name' => 'Real Estate', 'image' => 'industry-real-estate.webp', 'copy' => 'Launch campaigns made to move enquiries.'],
    ['name' => 'Healthcare', 'image' => 'industry-healthcare.webp', 'copy' => 'Trust-led digital experiences for care.'],
    ['name' => 'Education', 'image' => 'industry-education.webp', 'copy' => 'Demand generation for learning brands.'],
    ['name' => 'Retail and Ecommerce', 'image' => 'industry-commerce.webp', 'copy' => 'Campaigns built for attention and action.'],
];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-home">
    <section class="agency-hero">
        <div class="container agency-hero-grid">
            <div class="agency-hero-copy" data-reveal>
                <p class="agency-kicker"><span></span> Digital marketing and web studio</p>
                <h1>We make<br>brands <em>matter.</em></h1>
                <p class="agency-lede">Mega Techzy is a digital marketing company in Pune serving PCMC, Solapur and businesses across India with websites, SEO, paid ads and automation.</p>
                <div class="agency-hero-actions">
                    <a class="agency-button agency-button-gold" href="/contact.php">Start a project <?= icon_svg('arrow'); ?></a>
                    <a class="agency-text-link" href="#work">Explore our work <span>&darr;</span></a>
                </div>
                <div class="agency-hero-footer">
                    <span>Based in Maharashtra</span>
                    <span>Working across India</span>
                </div>
            </div>
            <div class="agency-hero-art" aria-label="Digital growth showcase" data-reveal>
                <div class="hero-orbit hero-orbit-one"></div>
                <div class="hero-orbit hero-orbit-two"></div>
                <div class="hero-growth-core">
                    <span class="hero-core-eyebrow"><i></i> Growth signal</span>
                    <strong>+68%</strong>
                    <span class="hero-core-copy">Organic visibility<br>built to compound</span>
                    <div class="hero-core-trend" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i></div>
                </div>
                <div class="hero-note hero-note-top"><strong>SEO</strong><span>Visibility</span></div>
                <div class="hero-note hero-note-bottom"><strong>ADS</strong><span>Momentum</span></div>
                <div class="hero-signal"><i></i><i></i><i></i><i></i><i></i></div>
            </div>
        </div>
        <div class="agency-scroll-cue">Scroll to discover <span>&darr;</span></div>
    </section>

    <section class="agency-marquee" aria-label="Mega Techzy capabilities">
        <div class="agency-marquee-track">
            <span>Websites</span><b>*</b><span>SEO</span><b>*</b><span>Paid Media</span><b>*</b><span>Branding</span><b>*</b><span>Automation</span><b>*</b><span>Lead Generation</span><b>*</b>
            <span>Websites</span><b>*</b><span>SEO</span><b>*</b><span>Paid Media</span><b>*</b><span>Branding</span><b>*</b>
        </div>
    </section>

    <section class="agency-statement section">
        <div class="container">
            <p class="agency-kicker dark-kicker"><span></span> The Mega Techzy approach</p>
            <div class="agency-statement-grid">
                <h2>Strategy meets <em>creative energy</em> and turns into growth.</h2>
                <div>
                    <p>We build the digital moments that make people stop, trust and take action. From the first Google search to the final enquiry, every touchpoint is deliberate.</p>
                    <a class="agency-text-link agency-text-link-dark" href="/about.php">Meet Mega Techzy <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="agency-work section" id="work">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker"><span></span> Selected work</p>
                <h2>Designed to be<br><em>remembered.</em></h2>
            </div>
            <a class="agency-button agency-button-outline" href="/portfolio/">View all work <?= icon_svg('arrow'); ?></a>
        </div>
        <div class="container work-grid">
            <article class="work-tile work-tile-wide" data-reveal>
                <img src="/assets/images/mega-techzy-digital-growth-hero.webp" alt="Digital growth dashboard and website design" loading="lazy" decoding="async" width="1712" height="960">
                <div class="work-tile-overlay">
                    <p>Digital Growth System</p>
                    <h3>Websites that become the centre of your marketing.</h3>
                    <span>Website development + analytics</span>
                </div>
            </article>
            <article class="work-tile work-tile-brand" data-reveal>
                <div class="work-brand-symbol">MT</div>
                <div class="work-tile-overlay">
                    <p>Brand Direction</p>
                    <h3>Identity with a clear point of view.</h3>
                    <span>Branding + creative strategy</span>
                </div>
            </article>
        </div>
    </section>

    <section class="agency-services section">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker dark-kicker"><span></span> What we do</p>
                <h2>Capabilities with<br><em>real pull.</em></h2>
            </div>
            <p class="agency-side-copy">Pick a focused service or connect every channel into one powerful growth engine.</p>
        </div>
        <div class="container agency-service-list">
            <?php $serviceNumber = 1; foreach (array_slice($services, 0, 8) as $slug => $service): ?>
                <a class="agency-service-row" href="/services/<?= e($slug); ?>.php" data-reveal>
                    <span class="agency-service-no">0<?= $serviceNumber++; ?></span>
                    <span class="agency-service-icon"><?= icon_svg($service['icon']); ?></span>
                    <span class="agency-service-name"><?= e($service['name']); ?></span>
                    <span class="agency-service-copy"><?= e($service['outcomes'][0]); ?></span>
                    <span class="agency-service-arrow"><?= icon_svg('arrow'); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="container agency-services-foot"><a class="agency-text-link agency-text-link-dark" href="/services/">See all 14 services <span>&rarr;</span></a></div>
    </section>

    <section class="agency-industries section">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker"><span></span> Industries</p>
                <h2>Different markets.<br><em>One sharp system.</em></h2>
            </div>
            <p class="agency-side-copy light-copy">Every industry needs a different trust story, offer and conversion path. We shape the system around yours.</p>
        </div>
        <div class="container industry-showcase-grid">
            <?php foreach ($industryShowcase as $index => $industry): ?>
                <article class="industry-tile industry-tile-<?= $index + 1; ?>" data-reveal>
                    <img src="/assets/images/<?= e($industry['image']); ?>" alt="<?= e($industry['name']); ?> marketing services" loading="lazy" decoding="async" width="1536" height="1024">
                    <div class="industry-tile-overlay">
                        <span>0<?= $index + 1; ?></span>
                        <h3><?= e($industry['name']); ?></h3>
                        <p><?= e($industry['copy']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="container industry-chip-row">
            <span>Professional Services</span><span>Local Businesses</span><span>Retail</span><span>Lead-focused B2B</span>
        </div>
    </section>

    <section class="agency-process section">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker dark-kicker"><span></span> How it moves</p>
                <h2>From first spark<br>to <em>real momentum.</em></h2>
            </div>
        </div>
        <div class="container agency-process-grid">
            <?php foreach (['Discover' => 'Find the opportunity hiding in your market.', 'Define' => 'Turn insight into a focused growth plan.', 'Create' => 'Build the website, campaigns and content.', 'Evolve' => 'Measure, learn and keep compounding.'] as $number => $copy): ?>
                <article data-reveal>
                    <span><?= str_pad((string) (array_search($number, array_keys(['Discover' => '', 'Define' => '', 'Create' => '', 'Evolve' => ''])) + 1), 2, '0', STR_PAD_LEFT); ?></span>
                    <h3><?= e($number); ?></h3>
                    <p><?= e($copy); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="agency-proof section">
        <div class="container agency-proof-grid">
            <div class="agency-proof-mark">M<span>T</span></div>
            <blockquote>Clear strategy. Thoughtful creative. Measurable digital execution.<cite>The Mega Techzy approach</cite></blockquote>
            <div class="agency-proof-stat"><strong>01</strong><span>Connected growth system, built around your business</span></div>
        </div>
    </section>

    <section class="agency-insights section">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker dark-kicker"><span></span> Fresh thinking</p>
                <h2>Ideas with<br><em>commercial value.</em></h2>
            </div>
            <a class="agency-button agency-button-dark" href="/blog/">View all insights <?= icon_svg('arrow'); ?></a>
        </div>
        <?php if ($blogPosts): ?>
            <div class="container agency-insight-grid">
                <?php foreach ($blogPosts as $index => $post): ?>
                    <article data-reveal>
                        <span>0<?= $index + 1; ?> / Insights</span>
                        <h3><a href="/blog/<?= e($post['slug']); ?>.php"><?= e($post['title']); ?></a></h3>
                        <a href="/blog/<?= e($post['slug']); ?>.php" aria-label="Read <?= e($post['title']); ?>"><?= icon_svg('arrow'); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="container"><p class="agency-side-copy">Approved insights are being prepared.</p></div>
        <?php endif; ?>
    </section>

    <section class="section soft-section faq-section">
        <div class="container narrow">
            <p class="eyebrow">FAQs</p>
            <h2>Digital marketing questions, answered clearly</h2>
            <?php foreach ($homeFaqs as $faq): ?>
                <details>
                    <summary><?= e($faq['q']); ?></summary>
                    <p><?= e($faq['a']); ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="agency-cta">
        <div class="container agency-cta-inner">
            <p class="agency-kicker"><span></span> Let us build something meaningful</p>
            <h2>Ready when<br>you are.</h2>
            <a class="agency-button agency-button-gold" href="/contact.php">Tell us about your project <?= icon_svg('arrow'); ?></a>
            <p class="agency-cta-email">hello@megatechzy.com</p>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
