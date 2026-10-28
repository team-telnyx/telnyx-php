<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioGenerateBgParams;

/**
 * Type of scenario to generate.
 */
enum ScenarioType: string
{
    case WORKFLOW = 'workflow';

    case RED_TEAMING_VOICE = 'red_teaming_voice';

    case RED_TEAMING_TEXT = 'red_teaming_text';
}
