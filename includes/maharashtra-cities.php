<?php
declare(strict_types=1);

$city = static function (
    string $name,
    string $division,
    string $marketContext,
    array $audiences,
    array $focus,
    string $coverage = 'Municipal corporation market',
    ?string $searchName = null,
    ?string $shortTitle = null
): array {
    $searchName = $searchName ?? $name;

    return [
        'name' => $name,
        'division' => $division,
        'coverage' => $coverage,
        'statewide' => true,
        'indexable' => true,
        'headline' => 'Digital Marketing and Web Development Company in ' . $name,
        'title' => $shortTitle ?? ('Digital Marketing Company in ' . $name),
        'keyword' => 'digital marketing company in ' . $searchName,
        'meta' => 'Mega Techzy provides website development, SEO, Google Ads and lead generation for businesses in ' . $name . ' and across Maharashtra.',
        'intro' => 'Mega Techzy helps businesses in ' . $name . ' build SEO-ready websites, improve search visibility, run measurable campaigns and create clearer enquiry journeys.',
        'market_context' => $marketContext,
        'audiences' => $audiences,
        'focus' => $focus,
    ];
};

return [
    // Konkan Division and the Mumbai Metropolitan Region.
    'mumbai' => $city(
        'Mumbai',
        'Konkan',
        'Mumbai businesses compete in a dense, brand-conscious market where search visibility, fast mobile experiences and credible proof must work together. The strategy should separate high-intent service demand from broad awareness and measure qualified enquiries by source.',
        ['financial and professional services', 'media, retail and consumer brands', 'B2B and technology companies'],
        ['website-development', 'seo', 'branding', 'lead-generation'],
        'Municipal corporation and metro market'
    ),
    'thane' => $city(
        'Thane',
        'Konkan',
        'Thane combines established commercial areas with fast-growing residential and service demand. Location-led service pages, strong reviews and conversion-focused campaigns can help businesses reach customers comparing nearby providers.',
        ['real estate and construction', 'healthcare and education', 'professional and local services'],
        ['website-development', 'seo', 'google-ads', 'lead-generation']
    ),
    'navi-mumbai' => $city(
        'Navi Mumbai',
        'Konkan',
        'Navi Mumbai has a strong mix of corporate, logistics, technology and property markets. B2B content, service-specific search pages and reliable lead tracking are especially important when several decision makers influence an enquiry.',
        ['logistics and industrial businesses', 'technology and professional services', 'real estate and infrastructure companies'],
        ['website-development', 'seo', 'linkedin-ads', 'lead-generation']
    ),
    'kalyan-dombivli' => $city(
        'Kalyan-Dombivli',
        'Konkan',
        'Kalyan-Dombivli businesses serve a large commuter and residential market with strong local search behaviour. Clear service areas, mobile-first pages and rapid enquiry follow-up can improve both organic and paid campaign performance.',
        ['local service businesses', 'real estate and home services', 'healthcare and education providers'],
        ['website-development', 'seo', 'google-ads', 'whatsapp-marketing']
    ),
    'mira-bhayandar' => $city(
        'Mira-Bhayandar',
        'Konkan',
        'Mira-Bhayandar has expanding residential, retail and professional-service demand. Businesses need accurate local signals, useful service content and conversion paths that work well for customers researching on mobile.',
        ['real estate and property services', 'healthcare and wellness', 'retail and local professional services'],
        ['website-development', 'seo', 'google-ads', 'social-media']
    ),
    'bhiwandi' => $city(
        'Bhiwandi-Nizampur',
        'Konkan',
        'Bhiwandi-Nizampur is strongly connected to logistics, warehousing, textiles and regional trade. Websites should explain operational capabilities clearly, support B2B search intent and convert specification-led enquiries into organised sales follow-up.',
        ['logistics and warehousing companies', 'textile and manufacturing businesses', 'wholesale and B2B traders'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation'],
        'Municipal corporation market',
        'Bhiwandi'
    ),
    'ulhasnagar' => $city(
        'Ulhasnagar',
        'Konkan',
        'Ulhasnagar has active wholesale, retail, manufacturing and local-service networks. Product or service clarity, local discovery and simple WhatsApp or form-based follow-up can turn digital visibility into more useful conversations.',
        ['wholesale and retail businesses', 'small manufacturers and distributors', 'local service providers'],
        ['website-development', 'seo', 'social-media', 'whatsapp-marketing']
    ),
    'vasai-virar' => $city(
        'Vasai-Virar',
        'Konkan',
        'Vasai-Virar combines industrial estates with a large and growing residential market. A useful digital plan should distinguish B2B industrial demand from local consumer searches and give each audience a focused page and enquiry route.',
        ['manufacturing and industrial suppliers', 'real estate and construction', 'healthcare and local services'],
        ['website-development', 'seo', 'google-ads', 'lead-generation']
    ),
    'panvel' => $city(
        'Panvel',
        'Konkan',
        'Panvel is shaped by logistics, infrastructure, property development and connectivity with the wider Mumbai metropolitan region. Search campaigns and websites should make service areas, project capability and response expectations explicit.',
        ['logistics and transport businesses', 'real estate and infrastructure firms', 'hospitality and local services'],
        ['website-development', 'seo', 'google-ads', 'lead-generation']
    ),
    'palghar' => $city(
        'Palghar',
        'Konkan',
        'Palghar district businesses span industrial, agricultural, tourism and local-service markets. Regional landing pages work best when they explain the actual delivery area and connect customers to the right service or sales contact.',
        ['industrial and manufacturing companies', 'agriculture and food businesses', 'tourism and local services'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation'],
        'District-headquarter market'
    ),
    'alibag' => $city(
        'Alibag',
        'Konkan',
        'Alibag and the wider Raigad market include tourism, hospitality, real estate, marine-linked trade and local professional services. Visual trust, local discovery and fast enquiry response are central to converting seasonal and high-consideration demand.',
        ['hospitality and tourism businesses', 'real estate and construction', 'local professional services'],
        ['website-development', 'seo', 'social-media', 'google-ads'],
        'Raigad district-headquarter market',
        'Alibag Raigad'
    ),
    'ratnagiri' => $city(
        'Ratnagiri',
        'Konkan',
        'Ratnagiri businesses often serve agriculture, fisheries, tourism, education and regional trade. Search content should clarify availability, delivery coverage and seasonal demand while keeping enquiry channels easy to use on mobile.',
        ['agriculture and food businesses', 'tourism and hospitality', 'education and regional services'],
        ['website-development', 'seo', 'content-marketing', 'social-media'],
        'District-headquarter market'
    ),
    'sindhudurg' => $city(
        'Sindhudurg',
        'Konkan',
        'Sindhudurg has tourism, food, agriculture, fisheries and local-service opportunities spread across multiple towns. A district-focused website structure can connect specific services and destinations without pretending every enquiry has the same local intent.',
        ['tourism and hospitality businesses', 'food, agriculture and fisheries', 'local and professional services'],
        ['website-development', 'seo', 'content-marketing', 'social-media'],
        'District-headquarter market'
    ),

    // Pune Division.
    'pune' => $city(
        'Pune',
        'Pune',
        'Pune has competitive technology, education, manufacturing, healthcare and professional-service markets. Businesses need differentiated service pages, credible expertise and tracking that connects search or campaigns to qualified leads.',
        ['technology and startup companies', 'manufacturing and B2B firms', 'education and professional services'],
        ['website-development', 'seo', 'linkedin-ads', 'lead-generation'],
        'Municipal corporation and metro market'
    ),
    'pcmc' => $city(
        'Pimpri-Chinchwad',
        'Pune',
        'Pimpri-Chinchwad is a major industrial and automotive market with a growing technology and service ecosystem. B2B websites should present capabilities, industries, certifications and enquiry requirements in a form buyers can evaluate quickly.',
        ['automotive and engineering companies', 'industrial suppliers and manufacturers', 'technology and professional services'],
        ['website-development', 'seo', 'linkedin-ads', 'lead-generation'],
        'Municipal corporation and metro market',
        'PCMC',
        'Digital Marketing Company in PCMC'
    ),
    'solapur' => $city(
        'Solapur',
        'Pune',
        'Solapur has strong textile, manufacturing, healthcare, education and regional-service demand. The website should combine clear business capability with local search relevance and practical lead follow-up rather than relying on one generic homepage.',
        ['textile and manufacturing businesses', 'healthcare and education providers', 'regional and local service companies'],
        ['website-development', 'seo', 'google-ads', 'lead-generation']
    ),
    'kolhapur' => $city(
        'Kolhapur',
        'Pune',
        'Kolhapur businesses span engineering, automotive supply, foundries, food, retail and tourism. Strong technical content and proof help B2B buyers, while local pages and campaigns support consumer and hospitality demand.',
        ['engineering and automotive suppliers', 'food, retail and consumer brands', 'tourism and hospitality businesses'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation']
    ),
    'ichalkaranji' => $city(
        'Ichalkaranji',
        'Pune',
        'Ichalkaranji is closely associated with textiles, manufacturing and B2B trade. Digital content should explain production capability, product range, quality controls and enquiry requirements for buyers researching suppliers.',
        ['textile manufacturers and processors', 'industrial suppliers', 'wholesale and B2B traders'],
        ['website-development', 'seo', 'content-marketing', 'linkedin-ads']
    ),
    'sangli-miraj-kupwad' => $city(
        'Sangli-Miraj-Kupwad',
        'Pune',
        'Sangli-Miraj-Kupwad combines agriculture-linked commerce, healthcare, education, manufacturing and regional trade. Search pages should separate local customer needs from B2B product or distribution enquiries.',
        ['agriculture and food businesses', 'healthcare and education providers', 'manufacturing and regional trade'],
        ['website-development', 'seo', 'google-ads', 'lead-generation'],
        'Municipal corporation market',
        'Sangli'
    ),
    'satara' => $city(
        'Satara',
        'Pune',
        'Satara businesses operate across manufacturing, agriculture, tourism, education and local services. A focused website should make service coverage and proof clear while supporting searches from both the city and surrounding district.',
        ['manufacturing and industrial businesses', 'agriculture and food companies', 'tourism and local services'],
        ['website-development', 'seo', 'content-marketing', 'google-ads'],
        'District-headquarter market'
    ),

    // Nashik Division.
    'nashik' => $city(
        'Nashik',
        'Nashik',
        'Nashik has competitive manufacturing, agriculture, wine, hospitality, real estate and professional-service markets. Businesses can benefit from separate B2B capability pages and consumer-focused local or campaign landing pages.',
        ['manufacturing and industrial companies', 'wine, food and hospitality brands', 'real estate and professional services'],
        ['website-development', 'seo', 'branding', 'lead-generation'],
        'Municipal corporation and metro market'
    ),
    'malegaon' => $city(
        'Malegaon',
        'Nashik',
        'Malegaon has a prominent textile and trading economy alongside retail and local services. Websites should help buyers understand products, production capability and contact routes while supporting city-level search demand.',
        ['textile businesses', 'wholesale and retail traders', 'local service providers'],
        ['website-development', 'seo', 'content-marketing', 'whatsapp-marketing']
    ),
    'ahilyanagar' => $city(
        'Ahilyanagar',
        'Nashik',
        'Ahilyanagar, also widely searched as Ahmednagar, includes manufacturing, agriculture, education, healthcare and regional-service demand. Content should use the current name clearly while helping customers who still search with the earlier name.',
        ['manufacturing and engineering firms', 'agriculture and food businesses', 'education, healthcare and local services'],
        ['website-development', 'seo', 'google-ads', 'lead-generation'],
        'Municipal corporation and district-headquarter market',
        'Ahilyanagar'
    ),
    'jalgaon' => $city(
        'Jalgaon',
        'Nashik',
        'Jalgaon businesses are connected to agriculture, food processing, jewellery, education, healthcare and regional trade. Search content should link product or service detail with clear delivery areas and measurable enquiry paths.',
        ['agriculture and food-processing businesses', 'jewellery and retail brands', 'education and healthcare providers'],
        ['website-development', 'seo', 'social-media', 'lead-generation']
    ),
    'dhule' => $city(
        'Dhule',
        'Nashik',
        'Dhule serves agriculture, transport, education, healthcare, retail and emerging industrial demand. Businesses need mobile-friendly pages, accurate service coverage and campaigns designed around specific customer problems.',
        ['agriculture and transport businesses', 'healthcare and education providers', 'retail and local services'],
        ['website-development', 'seo', 'google-ads', 'social-media']
    ),
    'nandurbar' => $city(
        'Nandurbar',
        'Nashik',
        'Nandurbar businesses serve a dispersed district market across agriculture, healthcare, education, retail and essential services. Clear location coverage and lightweight mobile experiences are important for useful discovery and enquiry handling.',
        ['agriculture and food businesses', 'healthcare and education providers', 'regional retail and services'],
        ['website-development', 'seo', 'content-marketing', 'whatsapp-marketing'],
        'District-headquarter market'
    ),

    // Chhatrapati Sambhajinagar Division.
    'chhatrapati-sambhajinagar' => $city(
        'Chhatrapati Sambhajinagar',
        'Chhatrapati Sambhajinagar',
        'Chhatrapati Sambhajinagar, still searched by many users as Aurangabad, has manufacturing, tourism, education, healthcare and B2B service demand. The content strategy should use the official name while remaining understandable to legacy-name searches.',
        ['manufacturing and industrial companies', 'tourism and hospitality businesses', 'education, healthcare and B2B services'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation'],
        'Municipal corporation and metro market',
        'Chhatrapati Sambhajinagar',
        'Digital Marketing in Chhatrapati Sambhajinagar'
    ),
    'jalna' => $city(
        'Jalna',
        'Chhatrapati Sambhajinagar',
        'Jalna has strong steel, seed, agriculture, manufacturing and trade activity. B2B pages should describe products, capacity, quality and enquiry requirements instead of relying on broad corporate claims.',
        ['steel and manufacturing companies', 'seed and agriculture businesses', 'B2B traders and regional services'],
        ['website-development', 'seo', 'content-marketing', 'linkedin-ads']
    ),
    'latur' => $city(
        'Latur',
        'Chhatrapati Sambhajinagar',
        'Latur businesses operate across education, healthcare, agriculture, food, retail and regional services. A strong digital plan should combine local discovery with practical lead capture and timely follow-up.',
        ['education and training providers', 'healthcare organisations', 'agriculture, food and regional services'],
        ['website-development', 'seo', 'google-ads', 'whatsapp-marketing']
    ),
    'nanded' => $city(
        'Nanded-Waghala',
        'Chhatrapati Sambhajinagar',
        'Nanded-Waghala is a regional centre for education, healthcare, tourism, retail and professional services. Search pages should answer trust and availability questions early and make calls, forms or WhatsApp enquiries easy to complete.',
        ['education and healthcare providers', 'tourism and hospitality businesses', 'retail and professional services'],
        ['website-development', 'seo', 'google-ads', 'social-media'],
        'Municipal corporation and district-headquarter market',
        'Nanded',
        'Digital Marketing Company in Nanded'
    ),
    'parbhani' => $city(
        'Parbhani',
        'Chhatrapati Sambhajinagar',
        'Parbhani businesses serve agriculture, education, healthcare, retail and regional trade. Content should clarify the customer problem, operating area and next step instead of repeating generic city keywords.',
        ['agriculture and food businesses', 'education and healthcare providers', 'retail and regional service companies'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation']
    ),
    'beed' => $city(
        'Beed',
        'Chhatrapati Sambhajinagar',
        'Beed businesses span agriculture, education, healthcare, retail and local services across a broad district. Mobile usability, clear coverage information and responsible enquiry follow-up are central to an effective regional website.',
        ['agriculture and regional trade', 'education and healthcare providers', 'retail and local services'],
        ['website-development', 'seo', 'content-marketing', 'whatsapp-marketing'],
        'District-headquarter market'
    ),
    'hingoli' => $city(
        'Hingoli',
        'Chhatrapati Sambhajinagar',
        'Hingoli has agriculture, trade, healthcare, education and local-service demand spread across the district. Digital pages should state exactly what is available, where it is delivered and how a customer can receive a response.',
        ['agriculture and trade businesses', 'healthcare and education providers', 'local and professional services'],
        ['website-development', 'seo', 'content-marketing', 'whatsapp-marketing'],
        'District-headquarter market'
    ),
    'dharashiv' => $city(
        'Dharashiv',
        'Chhatrapati Sambhajinagar',
        'Dharashiv, formerly widely known as Osmanabad, has agriculture, tourism, education, healthcare and regional-service demand. Using the official name alongside useful legacy-name context supports clarity without creating duplicate pages.',
        ['agriculture and food businesses', 'tourism and hospitality', 'education, healthcare and local services'],
        ['website-development', 'seo', 'content-marketing', 'google-ads'],
        'District-headquarter market',
        'Dharashiv'
    ),

    // Amravati Division.
    'akola' => $city(
        'Akola',
        'Amravati',
        'Akola businesses operate across agriculture, food, trade, healthcare, education and services. Search-led content should connect product or service information to a clear regional delivery and enquiry process.',
        ['agriculture and food businesses', 'healthcare and education providers', 'trade and professional services'],
        ['website-development', 'seo', 'google-ads', 'lead-generation']
    ),
    'amravati' => $city(
        'Amravati',
        'Amravati',
        'Amravati has education, healthcare, agriculture, retail and professional-service markets with strong regional reach. Businesses need useful service pages, trustworthy proof and measurement that distinguishes attention from genuine leads.',
        ['education and healthcare providers', 'agriculture and food companies', 'retail and professional services'],
        ['website-development', 'seo', 'social-media', 'lead-generation']
    ),
    'buldhana' => $city(
        'Buldhana',
        'Amravati',
        'Buldhana district businesses cover agriculture, food, tourism, healthcare, education and local services. Regional content should help customers understand availability and avoid thin pages that only repeat a place name.',
        ['agriculture and food businesses', 'tourism and local services', 'healthcare and education providers'],
        ['website-development', 'seo', 'content-marketing', 'social-media'],
        'District-headquarter market'
    ),
    'washim' => $city(
        'Washim',
        'Amravati',
        'Washim businesses serve agriculture, trade, healthcare, education and local-service needs. A practical digital setup prioritises fast mobile pages, accurate service details and simple enquiry channels.',
        ['agriculture and trade businesses', 'healthcare and education providers', 'local service companies'],
        ['website-development', 'seo', 'content-marketing', 'whatsapp-marketing'],
        'District-headquarter market'
    ),
    'yavatmal' => $city(
        'Yavatmal',
        'Amravati',
        'Yavatmal has agriculture, textiles, healthcare, education, retail and regional-service demand. Search and content should connect sector-specific questions to credible answers and an organised lead response.',
        ['agriculture and textile businesses', 'healthcare and education providers', 'retail and regional services'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation'],
        'District-headquarter market'
    ),

    // Nagpur Division.
    'nagpur' => $city(
        'Nagpur',
        'Nagpur',
        'Nagpur is a major logistics, education, healthcare, technology, professional-service and industrial market. Businesses can use focused B2B content, local service pages and accurate attribution to compete beyond broad city keywords.',
        ['logistics and industrial companies', 'technology and professional services', 'education and healthcare providers'],
        ['website-development', 'seo', 'linkedin-ads', 'lead-generation'],
        'Municipal corporation and metro market'
    ),
    'chandrapur' => $city(
        'Chandrapur',
        'Nagpur',
        'Chandrapur has energy, mining-linked supply chains, manufacturing, healthcare, education and regional services. B2B pages should document capabilities and safety or quality requirements while local pages support service discovery.',
        ['industrial and energy-sector suppliers', 'manufacturing businesses', 'healthcare, education and local services'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation']
    ),
    'bhandara' => $city(
        'Bhandara',
        'Nagpur',
        'Bhandara businesses include agriculture, food, industrial supply, healthcare, education and local services. A regional website should make the service scope, proof and response path clear for customers across the district.',
        ['agriculture and food businesses', 'industrial suppliers', 'healthcare, education and local services'],
        ['website-development', 'seo', 'content-marketing', 'whatsapp-marketing'],
        'District-headquarter market'
    ),
    'gadchiroli' => $city(
        'Gadchiroli',
        'Nagpur',
        'Gadchiroli organisations serve geographically dispersed communities and markets. Lightweight mobile pages, accurate availability information and accessible enquiry routes matter more than heavy visual effects or generic keyword repetition.',
        ['local enterprises and service organisations', 'education and healthcare providers', 'agriculture and forest-linked businesses'],
        ['website-development', 'seo', 'content-marketing', 'whatsapp-marketing'],
        'District-headquarter market'
    ),
    'gondia' => $city(
        'Gondia',
        'Nagpur',
        'Gondia has agriculture, food processing, trade, education, healthcare and regional-service demand. Search content should explain products or services in practical language and guide customers to the correct next step.',
        ['agriculture and food-processing businesses', 'trade and logistics companies', 'education, healthcare and local services'],
        ['website-development', 'seo', 'content-marketing', 'lead-generation'],
        'District-headquarter market'
    ),
    'wardha' => $city(
        'Wardha',
        'Nagpur',
        'Wardha has education, healthcare, agriculture, manufacturing and professional-service activity with close links to the Nagpur region. Businesses need distinct service content and lead tracking instead of treating every visitor as the same audience.',
        ['education and healthcare providers', 'agriculture and food businesses', 'manufacturing and professional services'],
        ['website-development', 'seo', 'google-ads', 'lead-generation'],
        'District-headquarter market'
    ),
];
