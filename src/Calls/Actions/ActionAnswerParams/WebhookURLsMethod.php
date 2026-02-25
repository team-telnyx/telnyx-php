<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

/**
 * HTTP request method to invoke `webhook_urls`.
 */
enum WebhookURLsMethod: string
{
    case POST = 'POST';

    case GET = 'GET';
}
