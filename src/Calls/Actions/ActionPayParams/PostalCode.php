<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionPayParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Controls billing postal code collection for credit-card payments when no `payment_token` is supplied. Set to `true` or the string `"true"` (the default) to prompt the caller for a postal code. Set to `false` or the string `"false"` to skip the postal code prompt without supplying a postal code to the payment connector. Supply any other non-empty string, such as `"90210"`, to use that postal code without prompting. Empty or whitespace-only strings are rejected. This option does not affect ACH debit payments or payments using an existing token.
 *
 * @phpstan-type PostalCodeVariants = string|bool
 * @phpstan-type PostalCodeShape = PostalCodeVariants
 */
final class PostalCode implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'bool'];
    }
}
