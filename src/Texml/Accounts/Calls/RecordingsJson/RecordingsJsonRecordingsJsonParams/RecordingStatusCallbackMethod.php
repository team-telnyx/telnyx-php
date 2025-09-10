<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;

/**
 * HTTP method used to send status callbacks.
 */
enum RecordingStatusCallbackMethod: string
{
    case GET = 'GET';

    case POST = 'POST';
}
