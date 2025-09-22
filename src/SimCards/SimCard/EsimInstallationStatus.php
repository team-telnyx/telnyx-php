<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

/**
 * The installation status of the eSIM. Only applicable for eSIM cards.
 */
enum EsimInstallationStatus: string
{
    case RELEASED = 'released';

    case DISABLED = 'disabled';
}
