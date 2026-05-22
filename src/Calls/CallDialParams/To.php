<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * The DID or SIP URI to dial out to. Multiple DID or SIP URIs can be provided using an array of strings. For SIP URI destinations, append `;secure=true` or `;secure=srtp` to enable SRTP media encryption for that endpoint, or `;secure=dtls` to enable DTLS media encryption for that endpoint. If `media_encryption` is set to `SRTP` or `DTLS`, it takes precedence over any per-endpoint `secure` URI parameter. For a single string destination, you may append a comma followed by DTMF digits (e.g. `+18004247767,200`) to play those digits as DTMF once the called party answers — equivalent to setting `send_digits_on_answer` separately. If both are present, the explicit `send_digits_on_answer` parameter takes precedence. This shorthand is not supported when `to` is an array.
 *
 * @phpstan-type ToVariants = string|list<string>
 * @phpstan-type ToShape = ToVariants
 */
final class To implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf('string')];
    }
}
