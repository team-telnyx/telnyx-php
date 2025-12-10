<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Number10dlc\Number10dlcGetResponse\EnumPaginatedResponse;

final class Number10dlcGetResponse implements ConverterSource
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
