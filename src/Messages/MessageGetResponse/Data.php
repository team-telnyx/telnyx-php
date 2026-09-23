<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Messages\MessagingInboundMessagePayload;
use Telnyx\Messages\OutboundMessagePayload;

/**
 * @phpstan-import-type OutboundMessagePayloadShape from \Telnyx\Messages\OutboundMessagePayload
 * @phpstan-import-type MessagingInboundMessagePayloadShape from \Telnyx\Messages\MessagingInboundMessagePayload
 *
 * @phpstan-type DataVariants = OutboundMessagePayload|MessagingInboundMessagePayload
 * @phpstan-type DataShape = DataVariants|OutboundMessagePayloadShape|MessagingInboundMessagePayloadShape
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
            'inbound' => MessagingInboundMessagePayload::class,
        ];
    }
}
