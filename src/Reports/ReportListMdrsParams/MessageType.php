<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsParams;

/**
 * Filter results by message type.
 */
enum MessageType: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';
}
