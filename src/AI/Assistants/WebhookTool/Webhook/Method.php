<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\WebhookTool\Webhook;

/**
 * The HTTP method to be used when calling the external tool.
 */
enum Method: string
{
    case GET = 'GET';

    case POST = 'POST';

    case PUT = 'PUT';

    case DELETE = 'DELETE';

    case PATCH = 'PATCH';
}
