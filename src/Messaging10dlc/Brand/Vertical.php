<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

/**
 * Vertical or industry segment of the brand or campaign.
 */
enum Vertical: string
{
    case AGRICULTURE = 'AGRICULTURE';

    case COMMUNICATION = 'COMMUNICATION';

    case CONSTRUCTION = 'CONSTRUCTION';

    case EDUCATION = 'EDUCATION';

    case ENERGY = 'ENERGY';

    case ENTERTAINMENT = 'ENTERTAINMENT';

    case FINANCIAL = 'FINANCIAL';

    case GAMBLING = 'GAMBLING';

    case GOVERNMENT = 'GOVERNMENT';

    case HEALTHCARE = 'HEALTHCARE';

    case HOSPITALITY = 'HOSPITALITY';

    case HUMAN_RESOURCES = 'HUMAN_RESOURCES';

    case INSURANCE = 'INSURANCE';

    case LEGAL = 'LEGAL';

    case MANUFACTURING = 'MANUFACTURING';

    case NGO = 'NGO';

    case POLITICAL = 'POLITICAL';

    case POSTAL = 'POSTAL';

    case PROFESSIONAL = 'PROFESSIONAL';

    case REAL_ESTATE = 'REAL_ESTATE';

    case RETAIL = 'RETAIL';

    case TECHNOLOGY = 'TECHNOLOGY';

    case TRANSPORTATION = 'TRANSPORTATION';
}
