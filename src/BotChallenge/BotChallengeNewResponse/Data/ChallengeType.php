<?php

declare(strict_types=1);

namespace Telnyx\BotChallenge\BotChallengeNewResponse\Data;

/**
 * Type of challenge.
 */
enum ChallengeType: string
{
    case MATH = 'math';

    case STRING = 'string';

    case BINARY = 'binary';
}
