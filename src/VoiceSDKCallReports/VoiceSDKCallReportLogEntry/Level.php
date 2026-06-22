<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportLogEntry;

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
