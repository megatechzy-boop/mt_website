<p>A new website can look complete while search engines receive conflicting signals. Technical SEO launch work is therefore a release checklist, not a plugin score. The goal is to make every important page reachable, renderable, indexable and represented by one stable canonical URL.</p>

<h2>Before launch: define the URL inventory</h2>
<p>Create a list of every page that should launch, its title, canonical URL and indexability decision. Map old URLs to new equivalents before changing the domain or structure. A removed page with a genuine replacement should receive a targeted permanent redirect; unrelated URLs should not all be redirected to the homepage.</p>

<h2>Crawl and index controls</h2>
<ul>
    <li>Confirm production <code>robots.txt</code> does not block required pages or resources.</li>
    <li>Remove staging <code>noindex</code> rules only from approved production pages.</li>
    <li>Keep low-value, duplicate or unfinished pages out of the XML sitemap.</li>
    <li>Return a genuine 404 or 410 for content that has no replacement.</li>
    <li>Ensure important navigation uses normal crawlable anchor links.</li>
</ul>
<p>Google can only read a page-level robots rule when crawling is allowed. Blocking a URL in <code>robots.txt</code> while relying on its <code>noindex</code> tag creates a conflicting setup.</p>

<h2>Canonical and redirect consistency</h2>
<p>Choose one HTTPS hostname and one final URL format. Redirect HTTP, alternate hostname and retired extensions to that format. Each indexable page should normally use a self-referencing canonical, and the sitemap should list that same final URL. Google treats canonical annotations as signals and may choose another canonical when content or signals conflict.</p>

<h2>Page-level quality checks</h2>
<ol>
    <li>One descriptive title and one clear H1 that match the page purpose.</li>
    <li>A useful meta description written for the search result, not stuffed with variants.</li>
    <li>Original main content that answers the intended visitor’s question.</li>
    <li>Meaningful internal links from relevant service, category or guide pages.</li>
    <li>Images sized correctly with descriptive alternative text when the image conveys information.</li>
    <li>Structured data that matches visible content and validates without invented facts.</li>
</ol>

<h2>Release-day test</h2>
<p>Crawl the production site from the homepage and sitemap. Check status codes, redirect chains, canonical targets, accidental <code>noindex</code>, orphan pages and broken assets. Test templates on mobile and submit every lead form. Verify the sitemap returns HTTP 200 and contains only absolute canonical URLs. Google notes that a sitemap supports discovery but does not guarantee indexing.</p>

<h2>After launch</h2>
<p>Add the canonical property to Search Console, submit the sitemap, inspect representative URLs and monitor Page Indexing, HTTPS and structured-data reports. Investigate patterns rather than chasing every historical URL. A “page with redirect” entry is expected for a retired URL; a sitemap URL that redirects is a signal mismatch.</p>
<p>Useful official references include Google’s guidance on <a href="https://developers.google.com/search/docs/crawling-indexing/sitemaps/overview">sitemaps</a>, <a href="https://developers.google.com/search/docs/crawling-indexing/canonicalization">canonicalization</a> and <a href="https://developers.google.com/search/docs/crawling-indexing/robots-meta-tag">robots meta rules</a>. Re-run this checklist after major template, domain, routing or CMS changes.</p>

