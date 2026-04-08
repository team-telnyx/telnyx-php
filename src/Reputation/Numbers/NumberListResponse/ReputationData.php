<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers\NumberListResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Reputation metrics (null if not yet fetched).
 *
 * @phpstan-import-type ReputationDataShape from \Telnyx\Reputation\Numbers\NumberListResponse\ReputationData\ReputationData as ReputationDataShape1
 *
 * @phpstan-type ReputationDataVariants = mixed|null|\Telnyx\Reputation\Numbers\NumberListResponse\ReputationData\ReputationData
 * @phpstan-type ReputationDataShape = ReputationDataVariants|ReputationDataShape1
 */
final class ReputationData implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ReputationData\ReputationData::class,
            'mixed',
        ];
    }
}
