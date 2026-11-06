<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost\CallCostBreakdown;

/**
 * The session's cost breakdown from Session Analysis, covering every product billed on the call: the AI Voice Assistant engine minutes (`ai-voice-assistant`), LLM inference tokens (`inference`), and call-control, SIP trunking, and recording lines. If cost data could not be retrieved after retries, this field carries the placeholder string `No cost data available.` instead of an object.
 *
 * @phpstan-import-type CallCostBreakdownShape from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost\CallCostBreakdown
 *
 * @phpstan-type CostVariants = string|CallCostBreakdown
 * @phpstan-type CostShape = CostVariants|CallCostBreakdownShape
 */
final class Cost implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [CallCostBreakdown::class, 'string'];
    }
}
