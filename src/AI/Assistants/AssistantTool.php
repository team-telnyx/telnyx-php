<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * The handoff tool allows the assistant to hand off control of the conversation to another AI assistant. By default, this will happen transparently to the end user.
 *
 * @phpstan-import-type WebhookToolShape from \Telnyx\AI\Assistants\WebhookTool
 * @phpstan-import-type RetrievalToolShape from \Telnyx\AI\Assistants\RetrievalTool
 * @phpstan-import-type HandoffToolShape from \Telnyx\AI\Assistants\AssistantTool\HandoffTool
 * @phpstan-import-type HangupToolShape from \Telnyx\AI\Assistants\HangupTool
 * @phpstan-import-type TransferToolShape from \Telnyx\AI\Assistants\TransferTool
 * @phpstan-import-type SipReferToolShape from \Telnyx\AI\Assistants\AssistantTool\SipReferTool
 * @phpstan-import-type DtmfToolShape from \Telnyx\AI\Assistants\AssistantTool\DtmfTool
 *
 * @phpstan-type AssistantToolVariants = WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool
 * @phpstan-type AssistantToolShape = AssistantToolVariants|WebhookToolShape|RetrievalToolShape|HandoffToolShape|HangupToolShape|TransferToolShape|SipReferToolShape|DtmfToolShape
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
            'webhook' => WebhookTool::class,
            'retrieval' => RetrievalTool::class,
            'handoff' => HandoffTool::class,
            'hangup' => HangupTool::class,
            'transfer' => TransferTool::class,
            'refer' => SipReferTool::class,
            'send_dtmf' => DtmfTool::class,
        ];
    }
}
