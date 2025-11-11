<?php

declare(strict_types=1);

namespace Telnyx\Enum;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Enum\EnumGetResponse\EnumListResponse;

final class EnumGetResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf(EnumListResponse::class), 'mixed', 'mixed'];
    }
}
