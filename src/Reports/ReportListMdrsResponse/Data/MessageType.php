<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsResponse\Data;

/**
 * Type of message.
 */
enum MessageType: string
{
    case SMS = 'SMS';

    case MMS = 'MMS';
}
