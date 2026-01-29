<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

/**
 * Vertical or industry segment of the brand or campaign.
 */
enum Vertical: string
{
    case REAL_ESTATE = 'REAL_ESTATE';

    case HEALTHCARE = 'HEALTHCARE';

    case ENERGY = 'ENERGY';

    case ENTERTAINMENT = 'ENTERTAINMENT';

    case RETAIL = 'RETAIL';

    case AGRICULTURE = 'AGRICULTURE';

    case INSURANCE = 'INSURANCE';

    case EDUCATION = 'EDUCATION';

    case HOSPITALITY = 'HOSPITALITY';

    case FINANCIAL = 'FINANCIAL';

    case GAMBLING = 'GAMBLING';

    case CONSTRUCTION = 'CONSTRUCTION';

    case NGO = 'NGO';

    case MANUFACTURING = 'MANUFACTURING';

    case GOVERNMENT = 'GOVERNMENT';

    case TECHNOLOGY = 'TECHNOLOGY';

    case COMMUNICATION = 'COMMUNICATION';
}
