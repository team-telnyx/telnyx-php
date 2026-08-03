<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\MessageUpdateParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Set to `true` for server time, an ISO 8601 timestamp for an explicit read time, or `null` to mark unread.
 *
 * @phpstan-type ReadAtVariants = bool|null|\DateTimeInterface
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
