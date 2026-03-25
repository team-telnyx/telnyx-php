<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseUpdateResponse\Data;

/**
 * Legal structure type.
 */
enum OrganizationLegalType: string
{
    case CORPORATION = 'corporation';

    case LLC = 'llc';

    case PARTNERSHIP = 'partnership';

    case NONPROFIT = 'nonprofit';

    case OTHER = 'other';
}
