<?php
require dirname(__DIR__) . '/includes/config.php';
require dirname(__DIR__) . '/includes/data.php';

$serviceItems = [];
foreach ($services as $slug => $service) {
    $serviceItems[] = [
        '@type' => 'ListItem',
        'position' => count($serviceItems) + 1,
        'name' => $service['name'],
        'url' => site_url('services/' . $slug),
    ];
}
$priorityServiceSlugs = ['website-development', 'video-marketing', 'social-media', 'branding', 'seo', 'google-ads', 'lead-generation', 'analytics'];
$serviceDisplaySlugs = array_values(array_unique(array_merge($priorityServiceSlugs, array_keys($services))));
$serviceFaqs = [
    ['q' => 'Can I start with one digital marketing service?', 'a' => 'Yes. You can start with the most urgent need, such as a new website, SEO audit, Google Ads campaign or lead follow-up workflow, then build the broader system over time.'],
    ['q' => 'Does Mega Techzy work with local businesses?', 'a' => 'Yes. Mega Techzy supports suitable projects across Maharashtra and India, adapting services to the local market, industry and sales process.'],
    ['q' => 'How do I choose between SEO and paid ads?', 'a' => 'SEO supports longer-term organic visibility, while paid ads can capture immediate demand. The right starting point depends on your offer, timeline, market and current website foundation.'],
    ['q' => 'Which digital marketing service is best for a small business?', 'a' => 'For most small local businesses, a fast mobile-friendly website plus local SEO and a Google Business Profile is the best first step. Add Google Ads when you need enquiries faster, and social media when your customers discover products visually.'],
    ['q' => 'How long does it take to see results from digital marketing?', 'a' => 'Paid ads can bring enquiries within days of launch. A new website goes live in about 2 to 5 weeks. SEO usually shows early movement in a few weeks and stronger results over 3 to 6 months.'],
    ['q' => 'How is digital marketing performance measured?', 'a' => 'Mega Techzy tracks enquiries, calls, WhatsApp chats and form submissions by source, along with rankings and ad costs, and shares the results in a monthly report.'],
];

$pageMeta = [
    'title' => 'Digital Marketing Services in Maharashtra | Mega Techzy',
    'description' => 'Explore website development, video and reel marketing, social media, branding, SEO, paid ads and lead-generation services in Maharashtra.',
    'path' => 'services/',
    'schema_type' => 'CollectionPage',
    'about' => ['digital marketing services', 'website development', 'SEO', 'paid advertising', 'automation', 'Maharashtra'],
];
$pageSchemas = [
    breadcrumb_schema([
        ['name' => 'Home', 'path' => ''],
        ['name' => 'Services', 'path' => 'services/'],
    ]),
    faq_schema($serviceFaqs),
    [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        '@id' => site_url('services/') . '#service-list',
        'name' => 'Mega Techzy digital marketing services',
        'numberOfItems' => count($serviceItems),
        'itemListElement' => $serviceItems,
    ],
];
include dirname(__DIR__) . '/includes/header.php';
include dirname(__DIR__) . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container narrow">
            <p class="eyebrow">Services</p>
            <h1>Digital Marketing Services in Maharashtra for Websites, SEO and Leads</h1>
            <p><strong>In short:</strong> Mega Techzy offers website development, SEO, Google and Meta Ads, social media, branding, WhatsApp automation and analytics for small and growing businesses in Pune, Pimpri-Chinchwad, Solapur, Nashik and across Maharashtra. You can start with one service or combine them into a complete growth plan.</p>
        </div>
    </section>
    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">How we work</p>
                <h2>What do digital marketing services include?</h2>
                <p>Digital marketing services are the online activities that help customers find, trust and contact your business: your website, search engine visibility, paid ads, social media and the follow-up after someone enquires.</p>
                <p>A customer may first discover your business through Google, an ad, social media, a referral or a local search. Mega Techzy helps make the next steps clearer: a fast website, a focused offer, useful proof, simple enquiry paths and reliable measurement.</p>
                <p>Established in 2019, we have served 100+ clients and delivered 50+ projects. Our services are designed to support practical outcomes such as stronger visibility, more relevant enquiries and better follow-up rather than isolated marketing activity.</p>
            </div>
            <div class="check-list">
                <div><?= icon_svg('check'); ?><span>Website development with SEO-ready structure.</span></div>
                <div><?= icon_svg('check'); ?><span>Video, reels and social content built around a clear brand.</span></div>
                <div><?= icon_svg('check'); ?><span>Brand identity and graphic design for consistent campaigns.</span></div>
                <div><?= icon_svg('check'); ?><span>SEO for local visibility and organic demand.</span></div>
                <div><?= icon_svg('check'); ?><span>Google and Meta Ads for focused campaigns.</span></div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container card-grid service-grid">
            <?php foreach ($serviceDisplaySlugs as $slug): if (!isset($services[$slug])) continue; $service = $services[$slug]; ?>
                <article class="service-card">
                    <span class="card-icon"><?= icon_svg($service['icon']); ?></span>
                    <h2><a href="/services/<?= e($slug); ?>"><?= e($service['name']); ?></a></h2>
                    <p><?= e($service['intro']); ?></p>
                    <a class="link-arrow" href="/services/<?= e($slug); ?>">Learn more <?= icon_svg('arrow'); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="section">
        <div class="container narrow">
            <p class="eyebrow">Compare services</p>
            <h2>Which service should you choose?</h2>
            <p>Each service solves a different problem. Use this comparison to see what you get, how soon it works and how we measure it.</p>
            <div class="article-table-wrap" role="region" aria-label="Comparison of Mega Techzy services" tabindex="0">
                <table class="article-table">
                    <thead>
                        <tr><th scope="col">Service</th><th scope="col">What you get</th><th scope="col">Typical timeline</th><th scope="col">How we measure it</th></tr>
                    </thead>
                    <tbody>
                        <tr><th scope="row"><a href="/services/website-development">Website development</a></th><td>Fast, mobile-friendly, SEO-ready website with enquiry forms</td><td>2 to 5 weeks to launch</td><td>Speed, form and call enquiries</td></tr>
                        <tr><th scope="row"><a href="/services/seo">SEO</a></th><td>Technical fixes, service and location pages, Google Business Profile</td><td>Early movement in weeks; stronger in 3 to 6 months</td><td>Rankings, organic traffic and enquiries</td></tr>
                        <tr><th scope="row"><a href="/services/google-ads">Google Ads</a></th><td>Search campaigns for people already looking for your service</td><td>Live within days</td><td>Cost per lead and qualified enquiries</td></tr>
                        <tr><th scope="row"><a href="/services/meta-ads">Meta Ads</a></th><td>Facebook, Instagram and WhatsApp campaigns for new audiences</td><td>Live within days</td><td>Cost per lead and lead quality</td></tr>
                        <tr><th scope="row"><a href="/services/social-media">Social media management</a></th><td>Monthly content calendar, creatives, reels and captions</td><td>Ongoing, monthly</td><td>Reach, engagement and profile enquiries</td></tr>
                        <tr><th scope="row"><a href="/services/whatsapp-marketing">WhatsApp marketing</a></th><td>Greeting, follow-up and broadcast workflows</td><td>1 to 2 weeks to set up</td><td>Response time and converted chats</td></tr>
                    </tbody>
                </table>
            </div>

            <h2>How do you get started?</h2>
            <ol>
                <li><strong>Free audit:</strong> share your website and goals; we review your Google visibility, website and current lead sources.</li>
                <li><strong>Written proposal:</strong> you get the recommended services, scope, timeline and price, usually within 24 hours.</li>
                <li><strong>Build and launch:</strong> we create the website, pages, campaigns and tracking you approve.</li>
                <li><strong>Monthly reporting:</strong> you see leads, rankings and costs, and we improve what is working.</li>
            </ol>
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
            <?php foreach ($serviceFaqs as $faq): ?>
                <details><summary><?= e($faq['q']); ?></summary><p><?= e($faq['a']); ?></p></details>
            <?php endforeach; ?>
            <a class="btn btn-primary" href="/contact">Discuss your service needs <?= icon_svg('arrow'); ?></a>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
