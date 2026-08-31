<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Returns jobs that targeted any of the supplied account-owned phone numbers. Values beginning with `+` must contain 1 to 20 digits after the plus sign. The 10-value limit is enforced before duplicate values are removed. Unmatched or non-account-owned identifiers return an empty result. Phone-number filtering must be enabled for the account.
 *
 * @phpstan-type PhoneNumberVariants = string|list<string>
 * @phpstan-type PhoneNumberShape = PhoneNumberVariants
 */
final class PhoneNumber implements ConverterSource
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
