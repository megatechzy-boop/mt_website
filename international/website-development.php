<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$pageMeta = [
    'title' => 'International Web Development Services | Mega Techzy',
    'description' => 'Remote web development services for international businesses that need fast, secure, SEO-ready websites, clear project milestones and reliable communication.',
    'path' => 'international/website-development.php',
    'language' => 'en',
    'about' => ['international web development', 'remote website delivery', 'technical SEO'],
    'hreflang' => [
        'en-IN' => site_url('services/website-development'),
        'en' => site_url('international/website-development'),
        'x-default' => site_url('international/website-development'),
    ],
];
$pageSchemas = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        '@id' => site_url('international/website-development') . '#service',
        'name' => 'International Web Development Services',
        'serviceType' => 'Website design and web development',
        'provider' => ['@id' => SITE_URL . '/#organization'],
        'areaServed' => 'Worldwide',
        'description' => $pageMeta['description'],
        'url' => site_url('international/website-development'),
    ],
    faq_schema([
        ['q' => 'Can Mega Techzy work with clients outside India?', 'a' => 'Yes. Selected international website projects can be delivered remotely with agreed milestones, documented feedback and planned meeting windows.'],
        ['q' => 'Who owns the website after launch?', 'a' => 'Ownership, access, hosting and handover expectations are defined in the project scope before development begins.'],
        ['q' => 'Is technical SEO included?', 'a' => 'The standard foundation covers crawlable page structure, metadata, canonical URLs, schema where relevant, mobile performance and analytics readiness.'],
    ]),
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'International Web Development', 'path' => 'international/website-development.php'],
    ]),
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">Remote Website Delivery</p>
                <h1>Web development services for international businesses</h1>
                <p>Mega Techzy plans and builds fast, secure and SEO-ready business websites for selected international clients through a clear remote delivery process.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="#international-form">Discuss your website <?= icon_svg('arrow'); ?></a>
                    <a class="btn btn-secondary" href="/services/website-development">View website service</a>
                </div>
            </div>
            <aside class="proof-panel">
                <span class="card-icon"><?= icon_svg('code'); ?></span>
                <h2>Built for a smooth remote project</h2>
                <p>Clear scope, milestone reviews, documented feedback and launch checks keep the work visible across locations and time zones.</p>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">What we build</p>
                <h2>Business websites designed to support growth</h2>
                <p>Each project begins with the audience, offer and required customer action. The result can be a focused company website, service-led lead generation site, campaign landing page or a custom website with agreed integrations.</p>
                <p>Content structure and technical decisions are made together so the website is useful to customers, maintainable by the business and ready for future search and campaign work.</p>
            </div>
            <div class="check-list">
                <div><?= icon_svg('check'); ?><span>Responsive UX and accessible page structure.</span></div>
                <div><?= icon_svg('check'); ?><span>Fast front-end development and mobile testing.</span></div>
                <div><?= icon_svg('check'); ?><span>Technical SEO, schema and analytics readiness.</span></div>
                <div><?= icon_svg('check'); ?><span>Secure forms, handover and launch documentation.</span></div>
            </div>
        </div>
    </section>

    <section class="section soft-section">
        <div class="container narrow">
            <p class="eyebrow">Delivery process</p>
            <h2>How an international website project works</h2>
            <h3>1. Discovery and scope</h3>
            <p>We confirm the target market, priority pages, required features, source content, decision makers and launch conditions. Assumptions and exclusions are written down before the build starts.</p>
            <h3>2. Structure and content direction</h3>
            <p>A page plan connects customer questions with services, proof and conversion actions. When more than one country or language is required, URLs, localisation responsibilities and hreflang relationships are planned before publishing.</p>
            <h3>3. Design, development and review</h3>
            <p>Milestones are reviewed through shared links and consolidated feedback. This reduces ambiguity and avoids late structural changes that can affect quality, timing and search performance.</p>
            <h3>4. Quality assurance and launch</h3>
            <p>We check responsive layouts, forms, metadata, canonical URLs, analytics, redirects and core page behaviour before handover. Post-launch support can be scoped around the business's actual operating needs.</p>
        </div>
    </section>

    <section class="section faq-section">
        <div class="container narrow">
            <p class="eyebrow">FAQs</p>
            <h2>International web development questions</h2>
            <details><summary>Can Mega Techzy work with clients outside India?</summary><p>Yes. Selected international projects can be delivered remotely with agreed milestones, documented feedback and planned meeting windows.</p></details>
            <details><summary>Who owns the website after launch?</summary><p>Ownership, access, hosting and handover expectations are defined in the project scope before development begins.</p></details>
            <details><summary>Is technical SEO included?</summary><p>The standard foundation covers crawlable page structure, metadata, canonical URLs, schema where relevant, mobile performance and analytics readiness.</p></details>
        </div>
    </section>

    <section class="section cta-section" id="international-form">
        <div class="container cta-layout">
            <div>
                <p class="eyebrow">Start with the brief</p>
                <h2>Tell us what the website needs to achieve.</h2>
                <p>Share the target market, required pages, integrations and preferred launch window. We will suggest the most practical next step.</p>
            </div>
            <div class="form-shell">
                <?php $formContext = 'International website development page'; include dirname(__DIR__) . '/includes/lead-form.php'; ?>
            </div>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
