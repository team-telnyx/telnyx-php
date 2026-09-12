<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Messages\MessagingInboundMessagePayload\To\UnionMember0;

/**
 * Receiving address. SMS and MMS webhooks use an array of recipients. WhatsApp webhooks use one E.164 phone number.
 *
 * @phpstan-import-type UnionMember0Shape from \Telnyx\Messages\MessagingInboundMessagePayload\To\UnionMember0
 *
 * @phpstan-type ToVariants = string|list<UnionMember0>
 * @phpstan-type ToShape = ToVariants|list<UnionMember0Shape>
 */
final class To implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf(UnionMember0::class), 'string'];
    }
}
