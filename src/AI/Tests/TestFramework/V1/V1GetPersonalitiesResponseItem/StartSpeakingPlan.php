<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type StartSpeakingPlanVariants = mixed|float
 * @phpstan-type StartSpeakingPlanShape = StartSpeakingPlanVariants
 */
final class StartSpeakingPlan implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['float', 'mixed'];
    }
}
