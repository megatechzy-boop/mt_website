<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-about">
            <a class="footer-wordmark" href="/" aria-label="Mega Techzy home">
                <img src="<?= e(asset_url('images/megatechzy-logo-enhanced.png')); ?>" alt="Mega Techzy" width="300" height="96">
            </a>
            <p>Premium digital marketing, website development, SEO, paid ads, automation and lead generation for ambitious businesses.</p>
            <span class="footer-availability"><i></i> Available for select projects</span>
        </div>
        <div class="footer-links">
            <h2>Services</h2>
            <a href="/services/website-development">Website Development</a>
            <a href="/international/website-development">International Web Development</a>
            <a href="/services/seo">SEO</a>
            <a href="/services/google-ads">Google Ads</a>
            <a href="/services/lead-generation">Lead Generation</a>
        </div>
        <div class="footer-links">
            <h2>Locations</h2>
            <a href="/locations/mumbai">Mumbai</a>
            <a href="/locations/pune">Pune</a>
            <a href="/locations/nagpur">Nagpur</a>
            <a href="/locations/nashik">Nashik</a>
            <a href="/locations/">All Maharashtra cities</a>
        </div>
        <div class="footer-contact">
            <span class="footer-contact-label">Have an idea?</span>
            <h2>Contact</h2>
            <a href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a>
            <a href="tel:<?= e(CONTACT_PHONES[0]); ?>">+91 70201 62163</a>
            <a href="tel:<?= e(CONTACT_PHONES[1]); ?>">+91 99754 52779</a>
            <button class="footer-enquiry" type="button" data-open-modal>Start an enquiry <span>&rarr;</span></button>
        </div>
    </div>
            <p>Premium digital marketing, website development, SEO, paid ads, automation and lead generation for ambitious businesses.</p>
            <span class="footer-availability"><i></i> Available for select projects</span>
        </div>
        <div class="footer-links">
            <h2>Services</h2>
            <a href="/services/website-development">Website Development</a>
            <a href="/services/seo">SEO</a>
            <a href="/services/google-ads">Google Ads</a>
            <a href="/services/lead-generation">Lead Generation</a>
        </div>
        <div class="footer-links">
            <h2>Locations</h2>
            <?php foreach (SERVICE_AREAS as $area): ?>
                <span><?= e($area); ?></span>
            <?php endforeach; ?>
        </div>
        <div class="footer-contact">
            <span class="footer-contact-label">Have an idea?</span>
            <h2>Contact</h2>
            <a href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a>
            <a href="tel:<?= e(CONTACT_PHONES[0]); ?>">+91 70201 62163</a>
            <a href="tel:<?= e(CONTACT_PHONES[1]); ?>">+91 99754 52779</a>
            <button class="footer-enquiry" type="button" data-open-modal>Start an enquiry <span>&rarr;</span></button>
        </div>
    </div>
    <div class="container footer-bottom">
        <span>&copy; <?= date('Y'); ?> Mega Techzy. All rights reserved.</span>
        <a href="/sitemap.xml">Sitemap</a>
    </div>
</footer>

<div class="modal" data-modal hidden>
    <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <button class="modal-close" type="button" data-close-modal aria-label="Close enquiry form">&times;</button>
        <h2 id="modal-title">Get Free SEO & Growth Audit</h2>
        <p>Share your website details and our team will send a custom growth plan within 24 hours.</p>
        <?php $formContext = 'Popup audit enquiry'; include __DIR__ . '/lead-form.php'; ?>
    </div>
</div>

<aside class="floating-lead-bar" aria-label="Quick Contact & Lead Options">
    <a href="https://wa.me/917020162163?text=Hi%20Mega%20Techzy%2C%20I%20want%20to%20rank%20my%20website%20and%20get%20more%20leads." class="floating-btn floating-btn-whatsapp" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 19 6.4 15.5A8 8 0 1 1 9 18.3L5 19Z"/><path d="M9 8.8c.4 2.7 2.1 4.5 5 5.3l1.2-1.2"/></svg>
        <span>WhatsApp Us</span>
    </a>
    <a href="tel:+917020162163" class="floating-btn floating-btn-call" aria-label="Call Now">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span>Call Now</span>
    </a>
    <button class="floating-btn floating-btn-audit" type="button" data-open-modal aria-label="Get Free SEO & Website Audit">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
        <span>Free Audit</span>
    </button>
</aside>

<script src="<?= e(asset_url('js/main.js')); ?>" defer></script>
</body>
</html>
