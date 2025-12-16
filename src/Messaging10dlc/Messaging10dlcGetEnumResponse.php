<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumResponse\EnumPaginatedResponse;

/**
 * @phpstan-import-type EnumPaginatedResponseShape from \Telnyx\Messaging10dlc\Messaging10dlcGetEnumResponse\EnumPaginatedResponse
 *
 * @phpstan-type Messaging10dlcGetEnumResponseShape = list<string>|list<array<string,mixed>>|EnumPaginatedResponseShape|array<string,mixed>|array<string,mixed>
 */
final class Messaging10dlcGetEnumResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            new ListOf('string'),
            new ListOf(new MapOf('mixed')),
            new MapOf('mixed'),
            new MapOf('mixed'),
            EnumPaginatedResponse::class,
        ];
    }
}
