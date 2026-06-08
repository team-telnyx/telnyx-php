<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseCreateParams;

/**
 * Legal-entity form. Pick the form that matches your incorporation documents:
 * - `corporation` - C-corp or S-corp.
 * - `llc` - limited liability company.
 * - `partnership` - general/limited partnership.
 * - `nonprofit` - non-profit corporation, charitable trust, or 501(c)(3)/equivalent.
 * - `other` - anything else (sole proprietorships, government bodies, DBAs, etc.). You may be asked for additional documents during vetting.
 */
enum OrganizationLegalType: string
{
    case CORPORATION = 'corporation';

    case LLC = 'llc';

    case PARTNERSHIP = 'partnership';

    case NONPROFIT = 'nonprofit';

    case OTHER = 'other';
}
