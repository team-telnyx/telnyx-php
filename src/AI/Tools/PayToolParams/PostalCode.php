<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools\PayToolParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Controls billing postal code collection for credit-card payments. Set to `false` to skip the postal code prompt without supplying a postal code to the payment connector (non-US cards, e.g. Irish Eircodes). Set to `true` to prompt the caller. Supply a non-empty string, such as `"90210"`, to use that postal code without prompting. This option does not affect ACH debit payments or payments using an existing token.
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
