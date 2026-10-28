<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioScenarioAgentParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;

/**
 * Scenario IDs to improve, or the literal string 'all'.
 *
 * @phpstan-type ScenariosVariants = string|list<mixed>
 * @phpstan-type ScenariosShape = ScenariosVariants
 */
final class Scenarios implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf('mixed'), 'string'];
    }
}
