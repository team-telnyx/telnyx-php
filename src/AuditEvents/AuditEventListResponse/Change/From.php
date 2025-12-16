<?php

declare(strict_types=1);

namespace Telnyx\AuditEvents\AuditEventListResponse\Change;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;

/**
 * The previous value of the field. Can be any JSON type.
 *
 * @phpstan-type FromShape = string|float|bool|list<array<string,mixed>>|array<string,mixed>
 */
final class From implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'string',
            'float',
            'bool',
            new MapOf('mixed'),
            new ListOf(new MapOf('mixed')),
        ];
    }
}
