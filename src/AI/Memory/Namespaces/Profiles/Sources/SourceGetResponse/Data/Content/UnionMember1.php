<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse\Data\Content;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * @phpstan-type UnionMember1Variants = string|float|bool|list<mixed>
 * @phpstan-type UnionMember1Shape = UnionMember1Variants
 */
final class UnionMember1 implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf('mixed'), 'string', 'float', 'bool'];
    }
}
