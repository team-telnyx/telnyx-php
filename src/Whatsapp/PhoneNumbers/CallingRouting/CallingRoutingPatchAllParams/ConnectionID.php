<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * ID of the connection to deliver inbound WhatsApp calls to: a positive integer up to 9223372036854775807, sent as a decimal string or an integer. Send a string to keep large IDs exact. Non-null values are returned as strings. `null` clears the routing.
 *
 * @phpstan-type ConnectionIDVariants = string|int
 * @phpstan-type ConnectionIDShape = ConnectionIDVariants
 */
final class ConnectionID implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'int'];
    }
}
