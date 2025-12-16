<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices\Contains;

/**
 * Filter by exact available service match.
 *
 * @phpstan-import-type ContainsShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices\Contains
 *
 * @phpstan-type AvailableServicesShape = AvailableService|ContainsShape|value-of<AvailableService>
 */
final class AvailableServices implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [AvailableService::class, Contains::class];
    }
}
