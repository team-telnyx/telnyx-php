<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\EmailBlock;

enum Reason: string
{
    case HARD_BOUNCE = 'hard_bounce';

    case SPAM_COMPLAINT = 'spam_complaint';

    case UNSUBSCRIBE = 'unsubscribe';

    case INVALID = 'invalid';

    case MANUAL_BLOCK = 'manual_block';
}
