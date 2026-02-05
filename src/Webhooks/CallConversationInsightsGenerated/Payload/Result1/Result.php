<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGenerated\Payload\Result1;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\MapOf;

/**
 * The result of the insight.
 *
 * @phpstan-type ResultVariants = string|array<string,mixed>
 * @phpstan-type ResultShape = ResultVariants
 */
final class Result implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new MapOf('mixed'), 'string'];
    }
}
