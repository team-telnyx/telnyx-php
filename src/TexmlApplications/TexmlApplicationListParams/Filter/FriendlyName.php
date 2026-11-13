<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationListParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\FriendlyName\UnionMember1;

/**
 * If present, applications with <code>friendly_name</code> exactly matching the given value will be returned. Matching is case-sensitive.
 *
 * @phpstan-import-type UnionMember1Shape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\FriendlyName\UnionMember1
 *
 * @phpstan-type FriendlyNameVariants = string|UnionMember1
 * @phpstan-type FriendlyNameShape = FriendlyNameVariants|UnionMember1Shape
 */
final class FriendlyName implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', UnionMember1::class];
    }
}
