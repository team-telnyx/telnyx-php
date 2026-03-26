<?php

declare(strict_types=1);

namespace Telnyx\ReputationPhoneNumberWithReputationData;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\MapOf;

/**
 * Reputation metrics (null if not yet fetched).
 *
 * @phpstan-import-type ReputationDataShape from \Telnyx\ReputationData as ReputationDataShape1
 *
 * @phpstan-type ReputationDataVariants = null|\Telnyx\ReputationData|array<string,mixed>
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
        return [\Telnyx\ReputationData::class, new MapOf('mixed')];
    }
}
