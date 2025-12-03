<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingFailedWebhookEvent\Data1\Payload;

/**
 * The type of stream connection the stream is performing.
 */
enum StreamType: string
{
    case WEBSOCKET = 'websocket';

    case DIALOGFLOW = 'dialogflow';
}
