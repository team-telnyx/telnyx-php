<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Filter by phone number country ISO alpha-2 code. Can be a single value or an array of values.
 */
final class CountryISOAlpha2 implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return ['string', new ListOf('string')];
    }
}
