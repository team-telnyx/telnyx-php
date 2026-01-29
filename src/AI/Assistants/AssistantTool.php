<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool;
use Telnyx\AI\Assistants\AssistantTool\SendMessageTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * The handoff tool allows the assistant to hand off control of the conversation to another AI assistant. By default, this will happen transparently to the end user.
 *
 * @phpstan-import-type InferenceEmbeddingWebhookToolParamsShape from \Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams
 * @phpstan-import-type RetrievalToolShape from \Telnyx\AI\Assistants\RetrievalTool
 * @phpstan-import-type HandoffToolShape from \Telnyx\AI\Assistants\AssistantTool\HandoffTool
 * @phpstan-import-type HangupToolShape from \Telnyx\AI\Assistants\HangupTool
 * @phpstan-import-type InferenceEmbeddingTransferToolShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool
 * @phpstan-import-type SipReferToolShape from \Telnyx\AI\Assistants\AssistantTool\SipReferTool
 * @phpstan-import-type DtmfToolShape from \Telnyx\AI\Assistants\AssistantTool\DtmfTool
 * @phpstan-import-type SendMessageToolShape from \Telnyx\AI\Assistants\AssistantTool\SendMessageTool
 *
 * @phpstan-type AssistantToolVariants = InferenceEmbeddingWebhookToolParams|RetrievalTool|HandoffTool|HangupTool|InferenceEmbeddingTransferTool|SipReferTool|DtmfTool|SendMessageTool
 * @phpstan-type AssistantToolShape = AssistantToolVariants|InferenceEmbeddingWebhookToolParamsShape|RetrievalToolShape|HandoffToolShape|HangupToolShape|InferenceEmbeddingTransferToolShape|SipReferToolShape|DtmfToolShape|SendMessageToolShape
 */
final class AssistantTool implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'webhook' => InferenceEmbeddingWebhookToolParams::class,
            'retrieval' => RetrievalTool::class,
            'handoff' => HandoffTool::class,
            'hangup' => HangupTool::class,
            'transfer' => InferenceEmbeddingTransferTool::class,
            'refer' => SipReferTool::class,
            'send_dtmf' => DtmfTool::class,
            'send_message' => SendMessageTool::class,
        ];
    }
}
