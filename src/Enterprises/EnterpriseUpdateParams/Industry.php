<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseUpdateParams;

enum Industry: string
{
    case ACCOUNTING = 'accounting';

    case FINANCE = 'finance';

    case BILLING = 'billing';

    case COLLECTIONS = 'collections';

    case BUSINESS = 'business';

    case CHARITY = 'charity';

    case NONPROFIT = 'nonprofit';

    case COMMUNICATIONS = 'communications';

    case TELECOM = 'telecom';

    case CUSTOMER_SERVICE = 'customer service';

    case SUPPORT = 'support';

    case DELIVERY = 'delivery';

    case SHIPPING = 'shipping';

    case LOGISTICS = 'logistics';

    case EDUCATION = 'education';

    case FINANCIAL = 'financial';

    case BANKING = 'banking';

    case GOVERNMENT = 'government';

    case PUBLIC = 'public';

    case HEALTHCARE = 'healthcare';

    case HEALTH = 'health';

    case PHARMACY = 'pharmacy';

    case MEDICAL = 'medical';

    case INSURANCE = 'insurance';

    case LEGAL = 'legal';

    case LAW = 'law';

    case NOTIFICATIONS = 'notifications';

    case SCHEDULING = 'scheduling';

    case REAL_ESTATE = 'real estate';

    case PROPERTY = 'property';

    case RETAIL = 'retail';

    case ECOMMERCE = 'ecommerce';

    case SALES = 'sales';

    case MARKETING = 'marketing';

    case SOFTWARE = 'software';

    case TECHNOLOGY = 'technology';

    case TECH = 'tech';

    case MEDIA = 'media';

    case SURVEYS = 'surveys';

    case MARKET_RESEARCH = 'market research';

    case TRAVEL = 'travel';

    case HOSPITALITY = 'hospitality';

    case HOTEL = 'hotel';
}
