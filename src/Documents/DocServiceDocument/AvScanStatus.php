<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocServiceDocument;

/**
 * The antivirus scan status of the document.
 */
enum AvScanStatus: string
{
    case SCANNED = 'scanned';

    case INFECTED = 'infected';

    case PENDING_SCAN = 'pending_scan';

    case NOT_SCANNED = 'not_scanned';
}
