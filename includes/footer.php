<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-about">
            <a class="footer-wordmark" href="/" aria-label="Mega Techzy home">
                <span>Mega</span>Techzy<sup>&reg;</sup>
            </a>
            <p>Premium digital marketing, website development, SEO, paid ads, automation and lead generation for ambitious businesses.</p>
            <span class="footer-availability"><i></i> Available for select projects</span>
        </div>
        <div class="footer-links">
            <h2>Services</h2>
            <a href="/services/website-development.php">Website Development</a>
            <a href="/services/seo.php">SEO</a>
            <a href="/services/google-ads.php">Google Ads</a>
            <a href="/services/lead-generation.php">Lead Generation</a>
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
        <h2 id="modal-title">Get a Growth Proposal</h2>
        <p>Share a few details and we will suggest the right website, SEO or campaign path.</p>
        <?php $formContext = 'Popup enquiry'; include __DIR__ . '/lead-form.php'; ?>
    </div>
</div>

<script src="<?= e(asset_url('js/main.js')); ?>" defer></script>
</body>
</html>
