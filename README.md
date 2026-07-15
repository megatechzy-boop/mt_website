# Mega Techzy Website

Production-ready PHP website for Mega Techzy, built with HTML5, CSS3, vanilla JavaScript and PHP 8+.

## Highlights

- Reusable PHP includes for header, navigation, footer, data and lead forms.
- Dedicated service pages for website development, SEO, ads, automation, branding and lead generation.
- Dedicated local SEO pages for Pune, PCMC, Solapur and nearby growth locations.
- SEO metadata, Open Graph, Twitter cards, JSON-LD schema, robots.txt and sitemap.xml.
- Secure contact endpoint with CSRF protection, honeypot spam protection, validation, sanitization and rate limiting.
- PHPMailer-ready email delivery with local JSONL enquiry fallback.

## Local Run

```bash
php -S localhost:8000
```

Then open `http://localhost:8000`.

## Production Notes

- Set `SITE_URL` to the final domain if it differs from `https://www.megatechzy.com`.
- Install PHPMailer with Composer and configure `SMTP_HOST`, `SMTP_PORT`, `SMTP_USER`, `SMTP_PASS`, `SMTP_SECURE`, `MAIL_FROM` and `CONTACT_EMAIL`.
- Ensure `/storage` is writable or replace the JSONL fallback with MySQL prepared statements.
- Replace placeholder portfolio text with verified client results before public launch.

