<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Metrics\AITestMetric;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type TotalScoreVariants = float|string
 * @phpstan-type TotalScoreShape = TotalScoreVariants
 */
final class TotalScore implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['float', 'string'];
    }
}
