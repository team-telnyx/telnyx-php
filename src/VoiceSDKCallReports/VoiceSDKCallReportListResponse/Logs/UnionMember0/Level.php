<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Logs\UnionMember0;

/**
 * Log level emitted by the SDK.
 */
enum Level: string
{
    case DEBUG = 'debug';

    case INFO = 'info';

    case WARN = 'warn';

    case ERROR = 'error';
}
