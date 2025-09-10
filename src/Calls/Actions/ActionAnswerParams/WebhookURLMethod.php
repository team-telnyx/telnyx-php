<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

/**
 * HTTP request type used for `webhook_url`.
 */
enum WebhookURLMethod: string
{
    case POST = 'POST';

    case GET = 'GET';
}
