<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\MapOf;

/**
 * Additional connector error information, when supplied by the processor.
 *
 * @phpstan-type ConnectorErrorVariants = string|array<string,mixed>
 * @phpstan-type ConnectorErrorShape = ConnectorErrorVariants
 */
final class ConnectorError implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new MapOf('mixed')];
    }
}
