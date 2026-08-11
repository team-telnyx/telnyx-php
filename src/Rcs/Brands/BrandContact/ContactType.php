<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands\BrandContact;

enum ContactType: string
{
    case BRAND = 'BRAND';

    case PRIMARY = 'PRIMARY';

    case OFFICER = 'OFFICER';

    case AGENT = 'AGENT';

    case RESPONSIBLE_PARTY = 'RESPONSIBLE_PARTY';

    case BILLING = 'BILLING';

    case UNKNOWN = 'UNKNOWN';
}
