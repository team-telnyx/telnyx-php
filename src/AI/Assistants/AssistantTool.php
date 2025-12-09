<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantTool\Handoff;
use Telnyx\AI\Assistants\AssistantTool\Refer;
use Telnyx\AI\Assistants\AssistantTool\SendDtmf;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * The handoff tool allows the assistant to hand off control of the conversation to another AI assistant. By default, this will happen transparently to the end user.
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
            'handoff' => Handoff::class,
            'hangup' => HangupTool::class,
            'transfer' => TransferTool::class,
            'refer' => Refer::class,
            'send_dtmf' => SendDtmf::class,
        ];
    }
}
