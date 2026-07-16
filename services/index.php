<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$pageMeta = [
    'title' => 'Digital Marketing Services | SEO, Websites, Ads and Automation - Mega Techzy',
    'description' => 'Explore Mega Techzy digital marketing services: website development, SEO, Google Ads, Meta Ads, automation, analytics and lead generation for businesses in Pune, PCMC, Solapur and India.',
    'path' => 'services/',
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Services', 'path' => 'services/'],
    ]),
    faq_schema([
        ['q' => 'What digital marketing services does Mega Techzy provide?', 'a' => 'Mega Techzy provides website development, SEO, Google Ads, Meta Ads, LinkedIn Ads, email and WhatsApp automation, analytics, branding, content marketing and lead generation services.'],
        ['q' => 'Can Mega Techzy combine website and marketing services?', 'a' => 'Yes. Mega Techzy can connect website development, SEO, paid ads, analytics and follow-up automation into one practical growth system.'],
        ['q' => 'Where does Mega Techzy provide digital marketing services?', 'a' => 'Mega Techzy works with businesses in Pune, PCMC, Solapur and across India.'],
    ]),
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Services</p>
            <h1>Digital marketing services for websites, visibility and qualified leads</h1>
            <p>Choose one focused service or connect website development, SEO, paid ads, automation and analytics into a complete digital growth system for your business.</p>
        </div>
    </section>
    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">How we work</p>
                <h2>Built around the journey from search to enquiry</h2>
                <p>A customer may first discover your business through Google, an ad, social media, a referral or a local search. Mega Techzy helps make the next steps clearer: a fast website, a focused offer, useful proof, simple enquiry paths and reliable measurement.</p>
                <p>Established in 2019, we have served 100+ clients and delivered 50+ projects. Our services are designed to support practical outcomes such as stronger visibility, more relevant enquiries and better follow-up rather than isolated marketing activity.</p>
            </div>
            <div class="check-list">
                <div><?= icon_svg('check'); ?><span>Website development with SEO-ready structure.</span></div>
                <div><?= icon_svg('check'); ?><span>SEO for local visibility and organic demand.</span></div>
                <div><?= icon_svg('check'); ?><span>Google and Meta Ads for focused campaigns.</span></div>
                <div><?= icon_svg('check'); ?><span>Automation and analytics for cleaner follow-up.</span></div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container card-grid service-grid">
            <?php foreach ($services as $slug => $service): ?>
                <article class="service-card">
                    <span class="card-icon"><?= icon_svg($service['icon']); ?></span>
                    <h2><a href="/services/<?= e($slug); ?>.php"><?= e($service['name']); ?></a></h2>
                    <p><?= e($service['intro']); ?></p>
                    <a class="link-arrow" href="/services/<?= e($slug); ?>.php">Learn more <?= icon_svg('arrow'); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="section soft-section">
        <div class="container card-grid">
            <article class="service-card"><span class="service-number">01</span><h2>Since 2019</h2><p>Digital marketing and website development experience built around practical business requirements.</p></article>
            <article class="service-card"><span class="service-number">02</span><h2>100+ clients served</h2><p>Support for businesses seeking a clearer online presence, growth plan and enquiry process.</p></article>
            <article class="service-card"><span class="service-number">03</span><h2>50+ projects delivered</h2><p>Website, SEO, advertising and automation work planned around defined goals.</p></article>
        </div>
    </section>
    <section class="section faq-section">
        <div class="container narrow">
            <p class="eyebrow">Services FAQs</p>
            <h2>Choosing the right digital marketing service</h2>
            <details><summary>Can I start with one service?</summary><p>Yes. You can start with the most urgent need, such as a new website, SEO audit, Google Ads campaign or lead follow-up workflow, then build the broader system over time.</p></details>
            <details><summary>Do you work with local businesses?</summary><p>Yes. Mega Techzy works with businesses in Pune, PCMC, Solapur and across India, adapting services to the local market and sales process.</p></details>
            <details><summary>How do I choose between SEO and paid ads?</summary><p>SEO supports longer-term organic visibility, while paid ads can capture immediate demand. The right starting point depends on your offer, timeline, market and current website foundation.</p></details>
            <a class="btn btn-primary" href="/contact">Discuss your service needs <?= icon_svg('arrow'); ?></a>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
