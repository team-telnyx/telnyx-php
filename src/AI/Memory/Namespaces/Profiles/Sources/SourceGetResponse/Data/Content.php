<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse\Data;

use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse\Data\Content\UnionMember1;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\MapOf;

/**
 * What was stored, in the shape it was sent: an ingested JSON body as JSON, a string body or a remembered fact as a string. A session ingested before formats were recorded is returned as the text it was stored as.
 *
 * @phpstan-type ContentVariants = string|float|bool|list<mixed>|array<string,mixed>
 * @phpstan-type ContentShape = ContentVariants
 */
final class Content implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new MapOf('mixed'), UnionMember1::class];
    }
}
