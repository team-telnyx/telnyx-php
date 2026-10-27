<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Results\TestRunResult;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type MetExpectedOutcomeCountVariants = int|string
 * @phpstan-type MetExpectedOutcomeCountShape = MetExpectedOutcomeCountVariants
 */
final class MetExpectedOutcomeCount implements ConverterSource
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
