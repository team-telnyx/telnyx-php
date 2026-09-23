<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionGetCountResponse\Data;

use Telnyx\Connections\ConnectionGetCountResponse\Data\Limits\GlobalConnectionLimit;
use Telnyx\Connections\ConnectionGetCountResponse\Data\Limits\PerTypeConnectionLimits;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Connection limits that apply to the user. Contains a single global_limit when a global connection limit applies, or per-type limits (standard_limit, texml_limit and uac_limit) when the user has per-type connection count capabilities.
 *
 * @phpstan-import-type GlobalConnectionLimitShape from \Telnyx\Connections\ConnectionGetCountResponse\Data\Limits\GlobalConnectionLimit
 * @phpstan-import-type PerTypeConnectionLimitsShape from \Telnyx\Connections\ConnectionGetCountResponse\Data\Limits\PerTypeConnectionLimits
 *
 * @phpstan-type LimitsVariants = GlobalConnectionLimit|PerTypeConnectionLimits
 * @phpstan-type LimitsShape = LimitsVariants|GlobalConnectionLimitShape|PerTypeConnectionLimitsShape
 */
final class Limits implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [GlobalConnectionLimit::class, PerTypeConnectionLimits::class];
    }
}
