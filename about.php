<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';
$pageMeta = [
    'title' => 'About Mega Techzy | Digital Marketing and Website Development Company',
    'description' => 'Mega Techzy is a digital marketing and website development company established in 2019, serving 100+ clients with 50+ projects across SEO, websites, ads and automation.',
    'path' => 'about',
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'About', 'path' => 'about'],
]), faq_schema([
    ['q' => 'When was Mega Techzy established?', 'a' => 'Mega Techzy was established in 2019.'],
    ['q' => 'What services does Mega Techzy provide?', 'a' => 'Mega Techzy provides website development, SEO, paid advertising, content marketing, automation, analytics and lead generation support.'],
    ['q' => 'How many clients has Mega Techzy served?', 'a' => 'Mega Techzy has served 100+ clients and delivered 50+ projects.'],
])];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">About Mega Techzy</p>
                <h1>Digital marketing and website development built for practical business growth</h1>
                <p>Established in 2019, Mega Techzy helps businesses build a stronger digital presence through website development, SEO, paid ads, content, automation and analytics.</p>
            </div>
            <aside class="proof-panel">
                <span class="card-icon"><?= icon_svg('shield'); ?></span>
                <h2>Since 2019</h2>
                <p>100+ clients served and 50+ projects delivered with a focus on clarity, trust and measurable progress.</p>
            </aside>
        </div>
    </section>
    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">Mission</p>
                <h2>Help businesses become easier to find, trust and contact</h2>
                <p>Mega Techzy started in 2019 with a simple belief: digital marketing works better when the website, search visibility, advertising, content and follow-up are planned together. We work with businesses that need a useful digital system, not a collection of disconnected activities.</p>
                <p>Our work is grounded in clear user experience, local SEO, website speed, secure enquiry paths and conversion-focused content. These foundations help customers understand the offer, make it easier for search engines to interpret the website and give teams a more reliable way to measure enquiries.</p>
            </div>
            <div class="check-list">
                <div><?= icon_svg('check'); ?><span>SEO-first website architecture.</span></div>
                <div><?= icon_svg('check'); ?><span>Campaigns measured by lead quality.</span></div>
                <div><?= icon_svg('check'); ?><span>Automation that improves follow-up speed.</span></div>
                <div><?= icon_svg('check'); ?><span>Design that feels professional and trustworthy.</span></div>
            </div>
        </div>
    </section>
    <section class="section soft-section">
        <div class="container split-heading">
            <div>
                <p class="eyebrow">Mega Techzy at a glance</p>
                <h2>Experience built around the full customer journey</h2>
            </div>
        </div>
        <div class="container card-grid">
            <article class="service-card">
                <span class="service-number">01</span>
                <h3>Established in 2019</h3>
                <p>Years of practical digital work supporting businesses that want a clearer online presence and lead process.</p>
            </article>
            <article class="service-card">
                <span class="service-number">02</span>
                <h3>100+ clients served</h3>
                <p>Experience working with business owners and teams across different digital growth requirements.</p>
            </article>
            <article class="service-card">
                <span class="service-number">03</span>
                <h3>50+ projects delivered</h3>
                <p>Website, SEO, advertising and automation projects planned around real business objectives.</p>
            </article>
        </div>
    </section>
    <section class="section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">What we do</p>
                <h2>One connected digital growth system</h2>
                <p>Our services are designed to work together. A high-quality website gives customers a place to understand and contact your business. SEO improves organic discovery. Paid campaigns capture demand faster. Automation helps your team follow up consistently, while analytics makes the next decision clearer.</p>
                <p>We serve businesses in Pune, PCMC, Solapur and across India, adapting the plan to the industry, service area, sales process and growth goal.</p>
            </div>
            <div class="check-list">
                <div><?= icon_svg('check'); ?><span>Website development with SEO-ready structure.</span></div>
                <div><?= icon_svg('check'); ?><span>Local SEO and content for search visibility.</span></div>
                <div><?= icon_svg('check'); ?><span>Google Ads and Meta Ads for lead generation.</span></div>
                <div><?= icon_svg('check'); ?><span>WhatsApp, email and CRM automation workflows.</span></div>
                <div><?= icon_svg('check'); ?><span>Analytics that connects activity with enquiries.</span></div>
            </div>
        </div>
    </section>
    <section class="section soft-section faq-section">
        <div class="container narrow">
            <p class="eyebrow">About Mega Techzy FAQs</p>
            <h2>Questions businesses ask before working with us</h2>
            <details><summary>When was Mega Techzy established?</summary><p>Mega Techzy was established in 2019.</p></details>
            <details><summary>What does Mega Techzy help businesses with?</summary><p>We help with website development, SEO, paid ads, content marketing, automation, analytics and lead generation.</p></details>
            <details><summary>Where does Mega Techzy work?</summary><p>We work with businesses in Pune, PCMC, Solapur and across India.</p></details>
            <a class="btn btn-primary" href="/contact">Talk to Mega Techzy <?= icon_svg('arrow'); ?></a>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
