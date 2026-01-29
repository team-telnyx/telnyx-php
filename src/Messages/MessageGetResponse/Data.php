<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\InboundMessagePayload;
use Telnyx\Messages\OutboundMessagePayload;

/**
 * @phpstan-import-type OutboundMessagePayloadShape from \Telnyx\Messages\OutboundMessagePayload
 * @phpstan-import-type InboundMessagePayloadShape from \Telnyx\InboundMessagePayload
 *
 * @phpstan-type DataVariants = OutboundMessagePayload|InboundMessagePayload
 * @phpstan-type DataShape = DataVariants|OutboundMessagePayloadShape|InboundMessagePayloadShape
 */
final class Data implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'direction';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'outbound' => OutboundMessagePayload::class,
            'inbound' => InboundMessagePayload::class,
        ];
    }
}
