<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\MessageUpdateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type ReadAtVariants = bool|\DateTimeInterface
 * @phpstan-type ReadAtShape = ReadAtVariants
 */
final class ReadAt implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['bool', '\DateTimeInterface'];
    }
}
