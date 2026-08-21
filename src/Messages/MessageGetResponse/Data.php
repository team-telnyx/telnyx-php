<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Messages\MessagingInboundMessagePayload;
use Telnyx\Messages\MessagingOutboundMessagePayload;

/**
 * @phpstan-import-type MessagingOutboundMessagePayloadShape from \Telnyx\Messages\MessagingOutboundMessagePayload
 * @phpstan-import-type MessagingInboundMessagePayloadShape from \Telnyx\Messages\MessagingInboundMessagePayload
 *
 * @phpstan-type DataVariants = MessagingOutboundMessagePayload|MessagingInboundMessagePayload
 * @phpstan-type DataShape = DataVariants|MessagingOutboundMessagePayloadShape|MessagingInboundMessagePayloadShape
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
            'outbound' => MessagingOutboundMessagePayload::class,
            'inbound' => MessagingInboundMessagePayload::class,
        ];
    }
}
