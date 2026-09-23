<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Comma-separated list of event types to include. Also accepts repeated
 * query parameters (e.g. event_type=delivered&event_type=bounced).
 * Unknown values return no matches.
 *
 * Dual-name compatibility: values are accepted
 * bare or `email.`-prefixed. A legacy value keeps matching the
 * rows it matched pre-rename — no widening: `failed` also
 * matches the rows that now store the canonical names of the
 * outcomes it covered (`gw_reject`, `injection_timeout`,
 * `expired`); `bounced` matches stored `bounced` rows only
 * (recipient-scoped Expirations stored `failed` pre-rename and
 * never matched `bounced`, so `expired` is deliberately not a
 * `bounced` expansion). A canonical value matches its own rows
 * plus legacy rows whose recorded payload evidence proves that
 * outcome (`expired` also surfaces legacy `bounced` rows with
 * `bounce_category: transient`). The additive
 * `canonical_event_type` field in each response row names the
 * canonical outcome.
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
