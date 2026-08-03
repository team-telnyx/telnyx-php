<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\EmailMessageBatchResponse\Error;

/**
 * Batch item errors use `message` (not `detail`) for the human-readable text.
 */
enum Code: string
{
    case BAD_REQUEST = 'bad_request';

    case NOT_FOUND = 'not_found';

    case FORBIDDEN = 'forbidden';

    case SERVICE_UNAVAILABLE = 'service_unavailable';

    case VALIDATION_ERROR = 'validation_error';

    case RECIPIENT_SUPPRESSED = 'recipient_suppressed';

    case REPUTATION_SUSPENDED = 'reputation_suspended';
}
