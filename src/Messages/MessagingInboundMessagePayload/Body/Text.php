<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\Body;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\Text\Body;

/**
 * RCS text string or WhatsApp text object.
 *
 * @phpstan-import-type BodyShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\Text\Body
 *
 * @phpstan-type TextVariants = string|Body
 * @phpstan-type TextShape = TextVariants|BodyShape
 */
final class Text implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', Body::class];
    }
}
