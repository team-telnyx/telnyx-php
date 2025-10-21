<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingErrorWebhookEvent\Data\Payload;

/**
 * Indication that there was a problem recording the call.
 */
enum Reason: string
{
    case FAILED_TO_AUTHORIZE_WITH_STORAGE_USING_CUSTOM_CREDENTIALS = 'Failed to authorize with storage using custom credentials';

    case INVALID_CREDENTIALS_JSON = 'Invalid credentials json';

    case UNSUPPORTED_BACKEND = 'Unsupported backend';

    case INTERNAL_SERVER_ERROR = 'Internal server error';
}
