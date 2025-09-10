<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights\InsightTemplate;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * If specified, the output will follow the JSON schema.
 */
final class JsonSchema implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return ['string', 'mixed'];
    }
}
