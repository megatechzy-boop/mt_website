<?php
$formContext = $formContext ?? 'Website enquiry';
$serviceChoices = $serviceChoices ?? service_options($services ?? []);
?>
<form class="lead-form" data-lead-form method="post" action="<?= e(site_url('api/contact.php')); ?>" novalidate>
    <input type="hidden" name="csrf_token" value="<?= e(csrf_token()); ?>">
    <input type="hidden" name="form_context" value="<?= e($formContext); ?>">
    <label class="hp-field">Leave this field empty
        <input type="text" name="website" tabindex="-1" autocomplete="off">
    </label>
    <div class="form-grid">
        <label>Name
            <input type="text" name="name" autocomplete="name" required maxlength="80">
        </label>
        <label>Phone
            <input type="tel" name="phone" autocomplete="tel" required maxlength="20" pattern="[0-9+\-\s()]{7,20}" title="Enter a valid phone number">
        </label>
        <label>Email
            <input type="email" name="email" autocomplete="email" required maxlength="120">
        </label>
        <label>Company Name
            <input type="text" name="company" autocomplete="organization" maxlength="120">
        </label>
        <label class="full">Service Interested In
            <select name="service" required>
                <option value="">Select a service</option>
                <?php foreach ($serviceChoices as $choice): ?>
                    <option value="<?= e($choice); ?>"><?= e($choice); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <label class="full">Message
            <textarea name="message" rows="4" maxlength="1200" placeholder="Tell us what you want to improve"></textarea>
        </label>
    </div>
    <button class="btn btn-primary" type="submit">Request Strategy Call <?= icon_svg('arrow'); ?></button>
    <p class="form-note" data-form-status aria-live="polite">We usually respond within one business day.</p>
</form>
