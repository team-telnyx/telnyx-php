<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationStartFailedWebhookEvent\Data\Payload;

/**
 * Why the conversation could not be started. `invalid_request`: the assistant request was rejected, for example because the assistant ID does not exist. `service_error`: the assistant could not be started because of an error on the Telnyx side.
 */
enum Reason: string
{
    case INVALID_REQUEST = 'invalid_request';

    case SERVICE_ERROR = 'service_error';
}
