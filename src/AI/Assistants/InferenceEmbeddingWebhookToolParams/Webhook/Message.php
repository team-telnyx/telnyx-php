<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message\WebhookToolRequestResponseDelayedMessage;
use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message\WebhookToolRequestStartMessage;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type WebhookToolRequestStartMessageShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message\WebhookToolRequestStartMessage
 * @phpstan-import-type WebhookToolRequestResponseDelayedMessageShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message\WebhookToolRequestResponseDelayedMessage
 *
 * @phpstan-type MessageVariants = WebhookToolRequestStartMessage|WebhookToolRequestResponseDelayedMessage
 * @phpstan-type MessageShape = MessageVariants|WebhookToolRequestStartMessageShape|WebhookToolRequestResponseDelayedMessageShape
 */
final class Message implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            WebhookToolRequestStartMessage::class,
            WebhookToolRequestResponseDelayedMessage::class,
        ];
    }
}
