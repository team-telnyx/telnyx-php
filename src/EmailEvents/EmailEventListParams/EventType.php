<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Comma-separated list of event types to include. Also accepts repeated query parameters (e.g. event_type=delivered&event_type=bounced). Unknown values return no matches.
 *
 * @phpstan-type EventTypeVariants = string|list<string>
 * @phpstan-type EventTypeShape = EventTypeVariants
 */
final class EventType implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', new ListOf('string')];
    }
}
