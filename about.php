<?php
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/data.php';
$aboutFaqs = [
    ['q' => 'When was Mega Techzy established?', 'a' => 'Mega Techzy was established in 2019.'],
    ['q' => 'What does Mega Techzy help businesses with?', 'a' => 'We help with website development, SEO, paid ads, content marketing, automation, analytics and lead generation.'],
    ['q' => 'Where does Mega Techzy work?', 'a' => 'We support suitable projects across Maharashtra and India, including Mumbai, Pune, Pimpri-Chinchwad, Nagpur, Nashik and Solapur.'],
    ['q' => 'Is Mega Techzy an agency or a freelancer?', 'a' => 'Mega Techzy is a founder-led digital marketing and web development company. You work directly with the people planning and doing the work, without the layers of a large agency.'],
    ['q' => 'What size of business does Mega Techzy work with?', 'a' => 'Mostly small and growing businesses: local service providers, clinics, manufacturers, builders, coaching institutes and retailers. The scope is matched to the size of the business and its budget.'],
    ['q' => 'How do I start working with Mega Techzy?', 'a' => 'Share your website and goals through the contact form or WhatsApp. We review your current online presence and send a written proposal with scope, timeline and price, usually within 24 hours.'],
];
$pageMeta = [
    'title' => 'About Mega Techzy | Digital Marketing & Web Development Company',
    'description' => 'Learn about Mega Techzy, established in 2019, with 100+ clients served and 50+ website, SEO, advertising and automation projects delivered.',
    'path' => 'about',
    'schema_type' => 'AboutPage',
    'about' => ['Mega Techzy', 'digital marketing company', 'website development company', 'Maharashtra'],
];
$pageSchemas = [breadcrumb_schema([
    ['name' => 'Home', 'path' => ''],
    ['name' => 'About', 'path' => 'about'],
]), faq_schema($aboutFaqs)];
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>
<main id="main" class="agency-inner">
    <section class="page-hero">
        <div class="container page-hero-grid">
            <div>
                <p class="eyebrow">About Mega Techzy</p>
                <h1>About Mega Techzy: a digital marketing and web development company</h1>
                <p><strong>In short:</strong> Mega Techzy is a founder-led digital marketing and web development company in Maharashtra, established in 2019. We help small and growing businesses get more qualified enquiries through websites, SEO, Google and Meta Ads, social media and WhatsApp automation, and we have served 100+ clients across 50+ projects.</p>
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
                <h2>What is Mega Techzy?</h2>
                <p>Mega Techzy is a company that plans and builds the online side of a business: the website customers visit, how the business appears on Google, the ads that bring new enquiries and the follow-up that turns those enquiries into customers. Our mission is to help businesses become easier to find, trust and contact.</p>
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
        <div class="container narrow">
            <p class="eyebrow">Who we work with</p>
            <h2>Who does Mega Techzy work with?</h2>
            <p>We work best with owners and teams who want measurable enquiries, not just more likes or traffic. Typical clients include:</p>
            <ul>
                <li><strong>Clinics and healthcare providers</strong> that need patient enquiries and a trustworthy online presence.</li>
                <li><strong>Manufacturers and B2B suppliers</strong> that need capability pages and buyer enquiries.</li>
                <li><strong>Builders and real estate developers</strong> that need project pages and site-visit leads.</li>
                <li><strong>Coaching institutes and schools</strong> that need admission enquiries.</li>
                <li><strong>Retailers and local service businesses</strong> that need visibility on Google Maps and social media.</li>
            </ul>
            <p>We serve businesses in <a href="/locations/pune">Pune</a>, <a href="/locations/pcmc">Pimpri-Chinchwad</a>, <a href="/locations/solapur">Solapur</a>, <a href="/locations/nashik">Nashik</a> and <a href="/locations/">other Maharashtra cities</a>, plus remote clients across India.</p>

            <h2>How is Mega Techzy different from a large agency or a freelancer?</h2>
            <p>Each option suits a different business. This comparison shows where Mega Techzy fits.</p>
            <div class="article-table-wrap" role="region" aria-label="Mega Techzy compared with a large agency and a freelancer" tabindex="0">
                <table class="article-table">
                    <thead>
                        <tr><th scope="col"></th><th scope="col">Mega Techzy</th><th scope="col">Large agency</th><th scope="col">Freelancer</th></tr>
                    </thead>
                    <tbody>
                        <tr><th scope="row">Who you talk to</th><td>The founder-led team doing the work</td><td>An account manager</td><td>One person</td></tr>
                        <tr><th scope="row">Services</th><td>Website, SEO, ads, social media and automation connected in one plan</td><td>Broad, often split across teams</td><td>Usually one or two skills</td></tr>
                        <tr><th scope="row">Budget fit</th><td>Scoped to small and growing businesses</td><td>Often suited to larger budgets</td><td>Lowest cost, limited capacity</td></tr>
                        <tr><th scope="row">Best for</th><td>Businesses that want measurable enquiries with a single accountable partner</td><td>Large brands with complex campaigns</td><td>Small one-off tasks</td></tr>
                    </tbody>
                </table>
            </div>

            <h2>How does Mega Techzy work?</h2>
            <ol>
                <li><strong>Understand:</strong> we review your website, Google visibility, competitors and current lead sources.</li>
                <li><strong>Plan:</strong> you receive a written proposal with priorities, scope, timeline and price.</li>
                <li><strong>Build:</strong> we create the website, pages, campaigns and tracking you approve.</li>
                <li><strong>Improve:</strong> monthly reporting shows leads and rankings, and we refine what works.</li>
            </ol>
            <p>Explore our <a href="/services/">digital marketing services</a> or read practical guides on the <a href="/blog/">Mega Techzy blog</a>.</p>
        </div>
    </section>
    <section class="section soft-section">
        <div class="container two-column">
            <div>
                <p class="eyebrow">What we do</p>
                <h2>One connected digital growth system</h2>
                <p>Our services are designed to work together. A high-quality website gives customers a place to understand and contact your business. SEO improves organic discovery. Paid campaigns capture demand faster. Automation helps your team follow up consistently, while analytics makes the next decision clearer.</p>
                <p>We support suitable businesses across Maharashtra and India, adapting the plan to the industry, service area, sales process and growth goal.</p>
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
    <section class="section faq-section">
        <div class="container narrow">
            <p class="eyebrow">About Mega Techzy FAQs</p>
            <h2>Questions businesses ask before working with us</h2>
            <?php foreach ($aboutFaqs as $faq): ?>
                <details><summary><?= e($faq['q']); ?></summary><p><?= e($faq['a']); ?></p></details>
            <?php endforeach; ?>
            <a class="btn btn-primary" href="/contact">Talk to Mega Techzy <?= icon_svg('arrow'); ?></a>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
