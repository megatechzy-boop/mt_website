<p>A lead-generation GA4 setup should answer three questions: which channel created the enquiry, what action the visitor completed, and whether that enquiry later became useful to sales. Counting every click as a conversion produces impressive dashboards but weak decisions. Start with an event plan before changing tags.</p>

<h2>Map the measurement plan</h2>
<p>List the real enquiry paths: contact form, quotation form, booked appointment, phone call and WhatsApp conversation. Choose one event for each completed outcome and document its trigger, parameters, owner and test method. Google recommends <code>generate_lead</code> when a visitor submits a form or request for information; using recommended event names helps compatible reporting.</p>

<h2>Trigger on success, not intent</h2>
<p>Fire <code>generate_lead</code> only after the server or application confirms a successful submission. A submit-button click can occur with invalid fields, network failure or spam rejection. For AJAX forms, listen for the application’s confirmed success state. For thank-you pages, prevent reloads from creating duplicate leads.</p>

<h2>Add parameters that support decisions</h2>
<ul>
    <li><code>form_name</code> or a stable form identifier.</li>
    <li><code>lead_type</code> such as audit, quotation or consultation.</li>
    <li><code>service</code> based on a controlled list rather than free text.</li>
    <li><code>page_location</code>, which GA4 normally collects with page context.</li>
</ul>
<p>Do not send names, phone numbers, email addresses or free-text messages to Analytics. Event parameters provide context, but only collect what is needed and permitted.</p>

<h2>Mark business outcomes deliberately</h2>
<p>After the event is verified, mark the appropriate lead event as a key event. Keep diagnostic events—form starts, validation errors and CTA clicks—available for funnel analysis without treating all of them as business results. If Google Ads imports GA4 key events, confirm the intended action is primary and avoid counting the same submission through duplicate tags.</p>

<h2>Test before trusting reports</h2>
<ol>
    <li>Use Tag Assistant or the browser’s debugging setup.</li>
    <li>Submit one valid test lead and one invalid attempt.</li>
    <li>Confirm only the successful lead produces <code>generate_lead</code>.</li>
    <li>Check parameters in DebugView and the Realtime report.</li>
    <li>Verify the lead reached the inbox or CRM with the same source context.</li>
    <li>Repeat on mobile and after cookie-consent choices.</li>
</ol>

<h2>Extend measurement to lead quality</h2>
<p>GA4 also documents lead-funnel events such as <code>qualify_lead</code>, <code>disqualify_lead</code>, <code>working_lead</code> and <code>close_convert_lead</code>. Use them only when CRM processes and identifiers can support reliable, privacy-safe offline updates. A smaller accurate setup is better than an elaborate funnel nobody maintains.</p>
<p>Reference: <a href="https://support.google.com/analytics/answer/9267735">Google Analytics recommended events</a>. Review the implementation quarterly and whenever forms, consent tools, domains or CRM routing change.</p>

