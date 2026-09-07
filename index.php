<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';

$pageMeta = [
    'title' => 'Digital Marketing & Web Development Company | Mega Techzy',
    'description' => 'Mega Techzy helps businesses grow through SEO, website development, Google Ads, social media marketing and lead generation with conversion-focused digital strategies.',
    'description_max_length' => 166,
    'path' => '',
    'about' => ['digital marketing', 'website development', 'SEO', 'Google Ads', 'social media marketing', 'lead generation'],
];
$pageSchemas = [
    website_schema(),
    faq_schema($homeFaqs),
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
    ]),
];
$industryShowcase = [
    ['name' => 'Manufacturing & B2B', 'image' => 'industry-manufacturing.webp', 'copy' => 'Industrial websites, technical SEO, LinkedIn marketing and lead generation for longer sales cycles.'],
    ['name' => 'Real Estate', 'image' => 'industry-real-estate.webp', 'copy' => 'Performance advertising, landing pages and enquiry campaigns for launches and ongoing inventory.'],
    ['name' => 'Healthcare & Clinics', 'image' => 'industry-healthcare.webp', 'copy' => 'Local SEO, trust-led websites and patient enquiry journeys designed for responsible growth.'],
    ['name' => 'Education', 'image' => 'industry-education.webp', 'copy' => 'Admissions-focused websites, search campaigns and social media for schools and training brands.'],
    ['name' => 'Retail & Ecommerce', 'image' => 'industry-commerce.webp', 'copy' => 'SEO, paid media and conversion-focused shopping experiences built around measurable sales.'],
];
$featuredHomeServiceSlugs = [
    'website-development',
    'video-marketing',
    'social-media',
    'branding',
    'seo',
    'google-ads',
    'lead-generation',
    'analytics',
];
$featuredHomeLocations = [
    'pune' => 'Digital Marketing in Pune',
    'pcmc' => 'Digital Marketing in PCMC',
    'mumbai' => 'Digital Marketing in Mumbai',
    'solapur' => 'Website Development in Solapur',
    'nashik' => 'Digital Marketing in Nashik',
    'nagpur' => 'Digital Marketing in Nagpur',
];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-home">
    <section class="agency-hero">
        <div class="container agency-hero-grid">
            <div class="agency-hero-copy">
                <p class="agency-kicker"><span></span> Digital marketing, creative and web studio</p>
                <h1>Digital Marketing<br>&amp; Web Development<br><em>Company</em></h1>
                <p class="agency-lede">Mega Techzy helps businesses generate more enquiries and grow online through SEO, high-performing websites, Google Ads, social media marketing and conversion-focused digital strategies. From local businesses and clinics to manufacturers and growing brands, we build practical digital solutions focused on visibility, leads and measurable business growth.</p>
                <div class="agency-hero-actions">
                    <a class="agency-button agency-button-gold" href="/contact">Get a Free Consultation <?= icon_svg('arrow'); ?></a>
                    <a class="agency-text-link" href="/services/">Explore Our Services <span>&rarr;</span></a>
                </div>
                <div class="agency-hero-footer">
                    <span>Based in Maharashtra</span>
                    <span>Working across India</span>
                </div>
            </div>
            <div class="agency-hero-art" aria-label="Digital growth showcase">
                <div class="hero-orbit hero-orbit-one"></div>
                <div class="hero-orbit hero-orbit-two"></div>
                <div class="hero-growth-core">
                    <span class="hero-core-eyebrow"><i></i> Growth signal</span>
                    <strong>SEO</strong>
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
                <h2>Why Businesses Choose <em>Mega Techzy.</em></h2>
                <div>
                    <p>We build the digital moments that make people stop, trust and take action. From the first Google search to the final enquiry, every touchpoint is deliberate.</p>
                    <a class="agency-text-link agency-text-link-dark" href="/about">Meet Mega Techzy <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="agency-work section" id="work">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker"><span></span> Selected work</p>
                <h2>Selected Digital<br><em>Work.</em></h2>
            </div>
                    <a class="agency-button agency-button-outline" href="/contact">Discuss a project <?= icon_svg('arrow'); ?></a>
        </div>
        <div class="container work-grid">
            <article class="work-tile work-tile-wide" data-reveal>
                <img src="<?= e(asset_url('images/mega-techzy-digital-growth-hero.webp')); ?>" alt="Digital growth dashboard and website design" loading="lazy" decoding="async" width="1712" height="960">
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
                <h2>Digital Marketing Services<br><em>That Drive Business Growth.</em></h2>
            </div>
            <p class="agency-side-copy">Pick a focused service or connect every channel into one powerful growth engine.</p>
        </div>
        <div class="container agency-service-list">
            <?php $serviceNumber = 1; foreach ($featuredHomeServiceSlugs as $slug): if (!isset($services[$slug])) continue; $service = $services[$slug]; ?>
                <a class="agency-service-row" href="/services/<?= e($slug); ?>" data-reveal>
                    <span class="agency-service-no">0<?= $serviceNumber++; ?></span>
                    <span class="agency-service-icon"><?= icon_svg($service['icon']); ?></span>
                    <h3 class="agency-service-name"><?= e($service['name']); ?></h3>
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
                <h2>Digital Marketing Solutions<br><em>for Different Industries.</em></h2>
            </div>
            <p class="agency-side-copy light-copy">Every industry needs a different trust story, offer and conversion path. We shape the system around yours.</p>
        </div>
        <div class="container industry-showcase-grid">
            <?php foreach ($industryShowcase as $index => $industry): ?>
                <article class="industry-tile industry-tile-<?= $index + 1; ?>" data-reveal>
                    <img src="<?= e(asset_url('images/' . $industry['image'])); ?>" alt="<?= e($industry['name']); ?> marketing services" loading="lazy" decoding="async" width="1536" height="1024">
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

    <section class="agency-locations section soft-section">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker dark-kicker"><span></span> Where we work</p>
                <h2>Serving Businesses Across<br><em>Maharashtra.</em></h2>
            </div>
            <p class="agency-side-copy">Our homepage introduces the full digital offering, while dedicated location pages explain the market, services and customer needs relevant to each city.</p>
        </div>
        <div class="container location-grid">
            <?php foreach ($featuredHomeLocations as $slug => $label): if (!isset($locations[$slug])) continue; ?>
                <a href="/locations/<?= e($slug); ?>"><?= e($label); ?> <?= icon_svg('arrow'); ?></a>
            <?php endforeach; ?>
        </div>
        <div class="container agency-services-foot"><a class="agency-text-link agency-text-link-dark" href="/locations/">Explore all service areas <span>&rarr;</span></a></div>
    </section>

    <section class="agency-process section">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker dark-kicker"><span></span> How it moves</p>
                <h2>Our Digital Marketing<br><em>Process.</em></h2>
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
            <div class="agency-proof-mark" aria-label="Established in 2019">20<span>19</span></div>
            <blockquote>100+ clients served through practical digital strategy, website development and marketing support.<cite>Mega Techzy delivery experience</cite></blockquote>
            <div class="agency-proof-stat"><strong>50+</strong><span>Website, SEO, advertising and automation projects delivered</span></div>
        </div>
    </section>

    <section class="agency-insights section">
        <div class="container agency-section-heading">
            <div>
                <p class="agency-kicker dark-kicker"><span></span> Fresh thinking</p>
                <h2>Digital Marketing<br><em>Insights.</em></h2>
            </div>
            <a class="agency-button agency-button-dark" href="/blog/">View all insights <?= icon_svg('arrow'); ?></a>
        </div>
        <?php if ($blogPosts): ?>
            <div class="container agency-insight-grid">
                <?php foreach (array_slice($blogPosts, 0, 6) as $index => $post): ?>
                    <article data-reveal>
                        <span>0<?= $index + 1; ?> / Insights</span>
                        <h3><a href="/blog/<?= e($post['slug']); ?>"><?= e($post['title']); ?></a></h3>
                        <a href="/blog/<?= e($post['slug']); ?>" aria-label="Read <?= e($post['title']); ?>"><?= icon_svg('arrow'); ?></a>
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
            <h2>Frequently Asked Questions</h2>
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
            <h2>Ready to Grow Your<br><em>Business Online?</em></h2>
            <a class="agency-button agency-button-gold" href="/contact">Tell us about your project <?= icon_svg('arrow'); ?></a>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
