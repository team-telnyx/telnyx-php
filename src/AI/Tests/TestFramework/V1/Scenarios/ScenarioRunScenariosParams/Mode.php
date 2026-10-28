<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRunScenariosParams;

enum Mode: string
{
    case SAME_NUMBER = 'same_number';

    case DIFFERENT_NUMBERS = 'different_numbers';
}
