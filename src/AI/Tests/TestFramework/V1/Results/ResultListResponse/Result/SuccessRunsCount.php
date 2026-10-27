<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results\ResultListResponse\Result;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type SuccessRunsCountVariants = int|string
 * @phpstan-type SuccessRunsCountShape = SuccessRunsCountVariants
 */
final class SuccessRunsCount implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['int', 'string'];
    }
}
