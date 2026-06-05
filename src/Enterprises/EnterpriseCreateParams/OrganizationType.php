<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseCreateParams;

/**
 * Organization category for vetting purposes:
 * - `commercial` — for-profit business entities (LLC, corp, partnership, sole proprietorship). Most callers fall here.
 * - `government` — federal/state/local government bodies.
 * - `non_profit` — registered 501(c)(3)/equivalent (incl. educational institutions, charities, religious organisations).
 */
enum OrganizationType: string
{
    case COMMERCIAL = 'commercial';

    case GOVERNMENT = 'government';

    case NON_PROFIT = 'non_profit';
}
