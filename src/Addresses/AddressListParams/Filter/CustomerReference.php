<?php

declare(strict_types=1);

namespace Telnyx\Addresses\AddressListParams\Filter;

use Telnyx\Addresses\AddressListParams\Filter\CustomerReference\CustomerReferenceMatcher;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * If present, addresses with <code>customer_reference</code> containing the given value will be returned. Matching is not case-sensitive.
 *
 * @phpstan-import-type CustomerReferenceMatcherShape from \Telnyx\Addresses\AddressListParams\Filter\CustomerReference\CustomerReferenceMatcher
 *
 * @phpstan-type CustomerReferenceShape = string|CustomerReferenceMatcherShape
 */
final class CustomerReference implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', CustomerReferenceMatcher::class];
    }
}
