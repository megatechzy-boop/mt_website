<header class="site-header">
    <nav class="nav container" aria-label="Main navigation">
        <a class="brand" href="/" aria-label="Mega Techzy home">
            <span class="brand-mark logo-mark">
                <picture>
                    <source srcset="<?= e(asset_url('images/megatechzy-logo-enhanced.webp')); ?>" type="image/webp">
                    <img src="<?= e(asset_url('images/megatechzy-logo-enhanced.png')); ?>" alt="Mega Techzy" width="230" height="72" style="display:block;width:230px;height:72px;object-fit:contain;" fetchpriority="high">
                </picture>
            </span>
            <span class="brand-word">Mega Techzy</span>
        </a>
        <button class="nav-toggle" type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="primary-menu">
            <span></span><span></span><span></span>
        </button>
        <div class="nav-links" id="primary-menu">
            <a href="/about">About</a>
            <a href="/services/">Services</a>
            <a href="/industries/">Industries</a>
            <a href="/blog/">Blog</a>
            <a class="nav-cta" href="/contact">Get Proposal</a>
        </div>
    </nav>
</header>
